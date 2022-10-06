import { src, dest } from 'gulp';
import yargs from 'yargs';
import postcss from 'gulp-postcss';
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'autoprefixer';
const sass = require('gulp-sass')(require('sass'));
import cleanCss from 'gulp-clean-css';
import gulpif from 'gulp-if';
import webpack from 'webpack-stream';
const PRODUCTION = yargs.argv.prod;

export const styles = () => {
  return src('assets/css/*.scss')
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(PRODUCTION, postcss([ autoprefixer ])))
    .pipe(gulpif(PRODUCTION, cleanCss({compatibility:'ie8'})))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(dest('dist/css'));
}

export const copy = () => {
  return src(['assets/**/*','!assets/{js,css}','!assets/{js,css}/**/*'])
    .pipe(dest('dist'));
}

export const scripts = () => {
  return src('assets/js/main.js')
  .pipe(webpack({
    module: {
      rules: [
        {
          test: /\.js$/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: []
            }
          }
        }
      ]
    },
    mode: PRODUCTION ? 'production' : 'development',
    devtool: !PRODUCTION ? 'inline-source-map' : false,
    output: {
      filename: 'main.js'
    },
  }))
  .pipe(dest('dist/js'));
}