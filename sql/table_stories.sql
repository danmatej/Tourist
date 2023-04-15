CREATE TABLE stories (
    story_id INT NOT NULL auto_increment,
    title varchar(255) NOT NULL,
    description text NOT NULL,
    location varchar(255) NOT NULL,
    category varchar(255) NOT NULL,
    created_on date NOT NULL,
    img_url varchar(255) NOT NULL,
    user_id INT NOT NULL,
    PRIMARY KEY  (story_id),
    CONSTRAINT FK_UsersStories FOREIGN KEY (user_id) REFERENCES users(user_id) 
)