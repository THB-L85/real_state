import {src, dest, watch, series} from 'gulp'
import * as dartSass from 'sass'
import gulpSass from 'gulp-sass'

const sass = gulpSass(dartSass);

const paths = {
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js',
    imagenes: 'src/img/**/*'
}

export function css() {
    return src(paths.scss)
        // .pipe(sourcemaps.init())
        .pipe(sass())
        // .pipe(postcss([autoprefixer(), cssnano()]))
        // // .pipe(postcss([autoprefixer()]))
        // .pipe(sourcemaps.write('.'))
        .pipe(dest('build/css'));
}

export function javascript() {
    return src(paths.js)
    //   .pipe(sourcemaps.init())
    //   .pipe(concat('bundle.js'))
    //   .pipe(terser())
    //   .pipe(sourcemaps.write('.'))
    //   .pipe(rename({ suffix: '.min' }))
      .pipe(dest('./build/js'))
}

function imagenes() {
    return src(paths.imagenes)
        // .pipe(cache(imagemin({ optimizationLevel: 3 })))
        .pipe(dest('build/img'))
        // .pipe(notify('Imagen Completada' ));
}

function versionWebp() {
    return src(paths.imagenes)
        // .pipe(webp())
        .pipe(dest('build/img'))
        // .pipe(notify({ message: 'Imagen Completada' }));
}

export function watchArchivos() {
    watch(paths.scss, css);
    watch(paths.js, javascript);
    // watch(paths.imagenes, imagenes);
    // watch(paths.imagenes, versionWebp);
}

export default series(css, javascript, watchArchivos); 