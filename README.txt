1.For linux, keep the folder in var/www/html folder. For windows if you use xampp, keep the folder in htdocs.
2.change the db configuration in .env file of project directory
3.import csv in db
4.Change <server name="DB_CONNECTION" value="sqlite"/> to appropiate connection. For example if you use mysql, change it to mysql
5.change <server name="DB_DATABASE" value=":memory:"/> to DB name. For example if db name is bongo then it should be 
 <server name="DB_DATABASE" value="bongo"/>
6.Test cases are written in tests/Feature/RestaurentTest.php file
7.Open command prompt from the project root and type vendor\bin\phpunit and press enter to see the result of unit test.