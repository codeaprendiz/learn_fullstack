# Float and clear properties

- In this code, the float and clear properties are used to control the layout of elements inside the .container div. Let's explain these properties in detail:

- float: The float property is used to specify how an element should be positioned horizontally within its containing block. Elements can be floated to the left, right, or remain inline. In this example, the float property is applied to the img element, making it float to the left:

```css
img {
    float: left;
    margin: 10px;
}
```

- By setting float: left;, the image will be positioned to the left side of its container, allowing the text in the \<p\> elements to flow around it to the right.

- clear: The clear property is used to control the flow of elements when they are floated. It specifies whether an element can be positioned next to floating elements on the left, right, or both sides. In this example, the clear property is applied to the first \<p\> element with the class .clear:

```css
.clear {
    clear: both;
}
```

- By setting clear: both;, you're telling the browser that the first \<p\> element should not be positioned next to any floating elements on either side. It will start a new line below the floated image, even if there is available space next to the image. The other two \<p\> elements will continue to flow around the image.
  


![img](.images/image-2023-04-15-12-41-06.png)

- index-v1.html

![img](.images/image-2023-04-15-12-41-06.png)