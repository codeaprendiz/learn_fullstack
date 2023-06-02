# Style the html

```css
body {
  padding: 0;
  margin: 0;
  font-family: var(--sans);
  background-color: var(--black);
  /*
  The following is the color of the text
  */
  color: var(--white);
  font-size: var(--font-size);
}
```

- padding: 0;: This sets the padding around the content of the `<body>` element to zero, so there is no space between the content and the edges of the `<body>` element.
- font-family: var(--sans);: This sets the font family for the text in the `<body>` element to the value of the custom property --sans. The --sans custom property is defined in the :root selector and has the value Oxygen, sans-serif, which means that the browser will use the Oxygen font if available, otherwise falling back to the default sans-serif font.
- background-color: var(--black);: This sets the background color of the `<body>` element to the value of the custom property --black, which is #171321 (a dark color).
- color: var(--white);: This sets the text color of the `<body>` element to the value of the custom property --white, which is #f7f8fa (a light color)
- font-size: var(--font-size);: This sets the font size of the text in the `<body>` element to the value of the custom property --font-size, which is 1.3rem. The rem unit is relative to the root element's font size (usually the `<html>` element), so this font size will be 1.3 times the root element's font size.

```css
h1,
h2,
h3 {
  /*
  Turn off default margin
  */
  margin: 0;
}
```

- This CSS block targets the h1, h2, and h3 heading elements and sets their margin property to 0. The purpose of this rule is to remove the default margin that browsers apply to these heading elements.


```css
a {
  color: var(--magenta);
}
```

- This CSS rule targets all the `<a>` elements (anchor or link elements) on the page and sets their color property to the value of the custom property (also known as CSS variable) --magenta.

- var(--magenta) is a reference to the custom property --magenta defined in the :root selector earlier in the CSS file. The value of --magenta is #e310cb, which is a magenta color.


![img](.images/image-2023-04-17-18-26-16.png)

- index-v1.html


![img](.images/image-2023-04-17-18-30-32.png)
