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