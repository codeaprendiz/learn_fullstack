# File Structure

- Version Info

```bash
$ showenv
node: v19.8.0
npm: 9.5.1
yarn: 1.22.19
```

- Create `scss/sections` and `scss/components` folders

```bash
$ mkdir -p scss/sections
.
$ mkdir -p scss/components
.
```

- Create following files

```bash
$ touch scss/components/_buttons.scss
.
$ touch scss/components/_animations.scss
.
$ touch scss/components/_mixins.scss
.
$ touch scss/components/_typography.scss
.
```

- Let's create files for sections

```bash
$ touch scss/sections/_navbar.scss
.
$ touch scss/sections/_intro-section.scss
.
$ touch scss/sections/_campanies.scss
.
$ touch scss/sections/_services.scss
.
$ touch scss/sections/_testimonials.scss
.
$ touch scss/sections/_faq.scss
.
$ touch scss/sections/_portfolio.scss
.
$ touch scss/sections/_get-started.scss
.
$ touch scss/sections/_footer.scss
.
```

- Import these partials to our `style.scss`

```scss
// Import Components

@import "components/buttons";
@import "components/animations";
@import "components/mixins";
@import "components/typography";

// Import Sections

@import "sections/navbar";
@import "sections/intro-section";
@import "sections/campanies";
@import "sections/services";
@import "sections/testimonials";
@import "sections/faq";
@import "sections/portfolio";
@import "sections/get-started";
@import "sections/footer";
```

- Compiling Sass

```bash
$ npm run compile:sass

> task-077@1.0.0 compile:sass
> sass --watch scss:assets/css

[2023-06-08 12:39] Compiled scss/style.scss to assets/css/style.css.
Sass is watching for changes. Press Ctrl-C to stop.
```
