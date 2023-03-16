# Finish the register func
## implement js form verification

# Story page

# story detail page

# user management page

# convert to html pages - separate php and html

#    //implement error message
##    header("Location: index.php?signupsuccess=false");


### create a view for user stories
Assuming that the user_id column in the stories table is a foreign key that references the id column in the users table, you can create a SQL view that joins these two tables and filters the result to show only the stories that are connected with a particular user.

Here's an example SQL view that shows stories connected with a user with ID 123:

sql

CREATE VIEW user_stories AS
SELECT s.id, s.title
FROM stories s
JOIN users u ON s.user_id = u.id
WHERE u.id = 123;

In this view, we join the stories table with the users table on the user_id column and the id column, respectively. We then filter the result to show only the rows where the user_id matches the ID of the user we're interested in (in this case, 123).

You can then query this view to retrieve the stories connected with a particular user:

sql

SELECT * FROM user_stories;

This will return a list of all the stories that are connected with the user with ID 123


### fix the password validation