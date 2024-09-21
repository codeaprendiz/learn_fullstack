# Classes and Objects

## Objects of type class

```bash
>>> print(type(1))
<class 'int'>

>>> print(type([]))
<class 'list'>

>>> print(type({}))
<class 'dict'>

>>> print(type(()))
<class 'tuple'>
```

---

## Classes

```python
class Circle():

  # Class Object Attribute
  pi = 3.14

  # Circle get instantiated with a radius (default is 1)
  def __init__(self, radius=1):
      self.radius = radius

  # Area method calculates the area. Note the use of self.
  def area(self):
      return self.radius * self.radius * Circle.pi

  # Method for resetting Radius
  def setRadius(self, radius):
      self.radius = radius

  # Method for getting radius (Same as just calling .radius)
  def getRadius(self):
      return self.radius


c = Circle()

c.setRadius(2)
print("Radius is: ",c.getRadius())
print("Area is:" ,c.area())
```

```bash
$ python3 circle.py   
Radius is:  2
Area is: 12.56
```

---

## Inheritence

```python
class Animal():
    def __init__(self):
        print("Animal created")

    def whoAmI(self):
        print("Animal")

    def eat(self):
        print("Eating")


class Dog(Animal):
    def __init__(self):
        Animal.__init__(self)
        print("Dog created")

    def whoAmI(self):
        print("Dog")

    def bark(self):
        print("Woof!")

d = Dog()
d.whoAmI()
d.eat()
d.bark()
```

```bash
$ python3 inheritence.py 
Animal created
Dog created
Dog
Eating
Woof!
```
