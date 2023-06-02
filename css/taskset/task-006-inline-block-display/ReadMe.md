# Inline Block Display

- In the given code, you have two types of elements: <div> and <span>. By default, <div> elements have a block-level display, while <span> elements have an inline display.

- When an element has a block-level display, it occupies the entire width of its parent container, creating a new line both before and after the element. The <div> elements in your example have a default display of block, so they will take up the full width and stack vertically.

- On the other hand, inline elements, like the <span> in your example, only take up the space required by their content and do not force new lines before or after them. As a result, inline elements can be placed next to each other horizontally.

- In summary, by using display: inline-block; for <div> elements and display: block; for <span> elements, you effectively swap their default display behavior, making <div> elements behave more like inline elements and <span> elements behave more like block elements.
  

![img](.images/img.png)


- index-v1.html

![img](.images/image-2023-04-15-09-50-55.png)