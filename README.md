# CABINET

`Basic OOP Structure of cabinet, shelf and item system.`

#### Every cabinet has shelves, every shelf has items in it.

`Structure is configured for extensibility.`

* There are two different folders, Classes and Interfaces.
* Classes have two different folders, Items and Shelves.
    * Currently, there is only one Item type that is Coke.
    * Coke extends the abstract class Item.
    * Item abstract class has all the logic. The real items that can be generated will extend from Item abstract class and only the size will be changed. 
      * For example, Coke item is occupied one space in the shelf. If we want to add another type that has occupied more than one space in the shelf than only thing we have to do is create a class and extend Item abstract class and change the size. 
    * Shelf has the same logic as Item.
    
### SOLID principals used in this project. 

#### Design pattern Template Method is used as well.
#### Shelf and Item classes can extend their functionality inside their separate classes. Since the abstract class is close for modification the type of shelves and items will extend without changing the existing code.


### Testing

#### In the root directory there is an index.php file. I create test cases for each functionality and after every function call I output the result. You can change the orientation and function calls to test.

