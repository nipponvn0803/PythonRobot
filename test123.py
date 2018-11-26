#Example __init__() Function
class Person:
    def __init__(self, name, age):
        self.name = name
        self.age = age
objectPerson = Person("John", 36)
print(objectPerson.name)
print(objectPerson.age)
