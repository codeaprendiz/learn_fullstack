# The Intro Section

- Version Info

```bash
$ showenv
node: v19.8.0
npm: 9.5.1
yarn: 1.22.19
```

- Start the intro section section

```html
        <section id="home" class="intro-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 intros">
                        <h1 class="display-2">
                            <span class="display-2--intro">Hey!, I'm Ankit</span>
                            <span class="display-2--description">This is a multipurpose responsive layout created with
                                bootstrap v5.3</span>
                        </h1>
                        <button type="button" class="rounded-pill btn-rounded">Get in Touch
                            <span><i class="fas fa-arrow-right"></i></span>
                        </button>
                    </div>
                    <div class="col-md-6 intros"></div>
                </div>
            </div>
        </section>
```

![img](.images/image-2023-06-11-15-02-45.png)

- Add more styling by adding file `_typography.scss`

```scss
@use '../custom' as *; // Importing everything from the 'custom' SCSS file.
.display-2 {  // Defining a class named 'display-2'.
    margin-bottom: 1rem; // Applying a bottom margin of 1rem to this class.
    text-transform: capitalize; // Transforming the text to capitalize the first letter of each word.
    &--intro { // Defining a modifier class 'display-2--intro' for 'display-2'.
        display: inline-block; // Making the element with this class display as an inline-block.
        font-weight: 700; // Setting the font weight to 700, making it bold.
    }
    &--description { // Defining a modifier class 'display-2--description' for 'display-2'.
        font-size: 1rem; // Setting the font size to 1rem.
        display: block; // Making the element with this class display as a block, occupying the full width of its parent container.
    }
}
```

![img](.images/image-2023-06-11-15-15-43.png)

- Add more styling by updating file `_intro-section.scss`

```scss
@use '../custom' as *; // Importing everything from the 'custom' SCSS file.
@use '../components/mixins' as *; // Importing everything from the 'mixins' SCSS file.

.intro-section { // Defining a class named 'intro-section'.
    @include gradient; // Including a mixin named 'gradient' that defines a gradient style.
    padding: 10rem 0 0 0; // Applying padding of 10rem to the top and no padding to the right, bottom and left sides.
    width: 100%; // Setting the width of the element with this class to 100% of the parent container's width.
    height: 100%; // Setting the height of the element with this class to 100% of the parent container's height.
}
```

![img](.images/image-2023-06-11-15-25-29.png)

- Add shadow in navbar by adding classes `shadow` and `fixed-top` in `nav` tag

```html
        <nav class="navbar navbar-expand-lg navbar-dark menu shadow fixed-top">
```

![img](.images/image-2023-06-11-15-28-58.png)

- Get font's from [fonts.google.com/specimen/Poppins?query=poppins](https://fonts.google.com/specimen/Poppins?query=poppins) and add in `index.html`
  
![img](.images/image-2023-06-11-16-02-06.png)

```html
...
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
            rel="stylesheet">
     </head>
     <body>
...
         <section id="home" class="intro-section">
...
                <div class="row align-items-center text-white">
```

- Add more styling by updating file `_typography.scss` and `index.html`

```scss
 .display-2 {  // Defining a class named 'display-2'.
  ...
    font-family: 'Poppins', sans-serif; // Setting the font family to 'Poppins' and sans-serif as a fallback.
     &--intro { // Defining a modifier class 'display-2--intro' for 'display-2'.
      ...
        font-family: 'Poppins', sans-serif; // Setting the font family to 'Poppins' and sans-serif as a fallback.
      ...
   }
    &--description {
      ...
        margin-top: 1.2rem; 
        ...
    }
 }
```

![img](.images/image-2023-06-11-15-53-50.png)

- Do more styling by adding `lh-base` class in `index.html`

```html
                            <span class="display-2--description lh-base">This is a multipurpose responsive layout
                                created with
                                bootstrap v5.3</span>
```

- also in `_typography.scss`

```scss
    &--description {
        ...
        line-height: 1.5; // Setting the line height to 1.5.
        text-transform: none; // Transforming the text to none.
    }
```

![img](.images/image-2023-06-11-16-14-45.png)

- Create folder `images/arts`

```bash
$ mkdir -p images/arts
.
```

- Get you image [https://www.manypixels.co/gallery](https://www.manypixels.co/gallery). Don't forget to change the color to #BB6EF5 as per our theme.

![img](.images/image-2023-06-11-16-25-49.png)

- Download and copy to `images/arts` folder

- Changes in `index.html`

```html
<!-- START THE CONTENT FOR THE INTRO -->
                    <!-- START THE CONTENT FOR THE VIDEO -->
                    <div class="col-md-6 intros">
                        <div class="video-box">
                            <img src="images/arts/intro_section_illustration.png" alt="video illustration"
                                class="img-fluid">
                        </div>
                    </div>

```

![img](.images/image-2023-06-11-16-32-36.png)

- Start adding the play button, move image to the end

```html
    <div class="col-md-6 intros text-end">
...
            <a href="#">
                <span>
                    <i class="fas fa-play"></i>
                </span>
            </a>
```

- changes in _intro-section.scss

```scss
...
.intros { // Defines a class 'intros'.
    
    .video-box { // Inside 'intros', defines another class 'video-box'.
        position: relative; // Positions '.video-box' relative to its normal position.
        a { // Targets anchor tags '<a>' within '.video-box'.
            position: absolute; // Positions '<a>' absolutely within '.video-box'.
            span { // Targets '<span>' tags within '<a>'.

                i { // Targets '<i>' tags within '<span>'.
                    font-size: 6rem; // Sets the font size of text within '<i>' tags to 6rem.
                    color: $black; // Sets the color of text within '<i>' tags to black, as defined by the $black variable.
                }
            }
        }
    }
}
```

![img](.images/image-2023-06-11-16-56-11.png)

- Checkout the positioning doc here [utilities/position/#position-values](https://getbootstrap.com/docs/5.3/utilities/position/#position-values)

- Move the circle to the center and change it's color to $secondary

- Changes in `_mixins.scss`


```scss
@mixin absoluteCenter { // Defining a mixin named 'absoluteCenter'.
    position: absolute; // The element is positioned relative to the nearest positioned ancestor (instead of positioned relative to the viewport).
    top: 50%; // Position the element 50% down from the top of its container.
    left: 50%; // Position the element 50% across from the left of its container.
    transform: translate(-50%, -50%); // Moves the element back along the x and y axis by 50%, effectively centering the element within its container.
}
```

- Changes in `_intro-section.scss`

```scss
...
        a { // Targets anchor tags '<a>' within '.video-box'.

            @include absoluteCenter; // Includes a mixin named 'absoluteCenter' that defines a style for absolute centering.
...
            span { // Targets '<span>' tags within '<a>'.

                i { // Targets '<i>' tags within '<span>'.
...
                    color: $secondary; // Sets the color of text within '<i>' tags to black, as defined by the $secondary variable.
                }
            }
        }
```

- Validate the changes by opening `index.html` in browser

![img](.images/image-2023-06-11-18-43-42.png)

- Achieving the same position in center by using changes in `index.html`

```html
                            <a href="#" class="position-absolute top-50 start-50 translate-middle">
```

- Changes in `_intro-section.scss`

```scss
            // @include absoluteCenter; // Includes a mixin named 'absoluteCenter' that defines a style for absolute centering.
```

![img](.images/image-2023-06-11-18-43-42.png)
