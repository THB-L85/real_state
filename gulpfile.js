import { src, dest, watch, parallel } from 'gulp';
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
import autoprefixer from 'autoprefixer';
import postcss from 'gulp-postcss';
import sourcemaps from 'gulp-sourcemaps';
import cssnano from 'cssnano';
import concat from 'gulp-concat';
import terser from 'gulp-terser';
import rename from 'gulp-rename';
import imagemin from 'gulp-imagemin';
import notify from 'gulp-notify';
import cache from 'gulp-cache';
import webp from 'gulp-webp';

const sass = gulpSass(dartSass);

const paths = {
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js',
    imagenes: 'src/img/**/*'
};

// CSS
export function css() {
    return src(paths.scss, { sourcemaps: true })
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss([
            autoprefixer(),
            cssnano()
        ]))
        .pipe(dest('build/css', { sourcemaps: '.' }));
}

// JavaScript
export function javascript() {
    return src(paths.js, { sourcemaps: true })
        .pipe(concat('bundle.js'))
        .pipe(terser())
        .pipe(rename({ suffix: '.min' }))
        .pipe(dest('build/js', { sourcemaps: '.' }));
}

// Imágenes
export function imagenes() {
    return src(paths.imagenes)
        .pipe(cache(
            imagemin({ optimizationLevel: 3 })
        ))
        .pipe(dest('build/img'))
        .pipe(notify({ message: 'Imágenes optimizadas' }));
}

// WebP
export function versionWebp() {
    return src(paths.imagenes)
        .pipe(webp())
        .pipe(dest('build/img'))
        .pipe(notify({ message: 'Imágenes WebP creadas' }));
}

// Watch
export function watchArchivos() {
    watch(paths.scss, css);
    watch(paths.js, javascript);
    watch(paths.imagenes, imagenes);
    watch(paths.imagenes, versionWebp);
}

// Default
export default parallel(
    css,
    javascript,
    imagenes,
    versionWebp,
    // watchArchivos
);
