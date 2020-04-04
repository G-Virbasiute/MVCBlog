CREATE TABLE USER_TABLE (
    UserID tinyint NOT NULL PRIMARY KEY AUTO_INCREMENT,
    UserType enum(TCUte DEFAULT "Member",    
    Username varchar(100) NOT NULL UNIQUE,
    ProfilePhoto varchar(100),
    FirstName varchar(100) NOT NULL,
    LastName varchar(100) NOT NULL,
    EmailAddress varchar(100) NOT NULL, 
    User_Passteword varchar(100) NOT NULL
);


CREATE TABLE BLOG_POSTS (
    PostID tinyint NOT NULL PRIMARY KEY AUTO_INCREMENT,
    UserID tinyint NOT NULL,
    Title varchar(100) NOT NULL,
    Blurb text NOT NULL,
    MainImage varchar(100) NOT NULL,
    Content text NOT NULL,
    DifficultyRating ENUM('Beginner', 'Intermediate', 'Expert'),
    Created timestamp NOT NULL,
    Published timestamp,
    Updated timestamp,
    PostViews int(11) NOT NULL DEFAULT '0',
    PostStatus tinyint(1) NOT NULL C,
    foreign key (UserID) references USER_TABLE(UserID)
);

CREATE TABLE POST_CATEGORY (
  CategoryID tinyint NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Category varchar(100) NOT NULL
);

CREATE TABLE POST_CATEGORY_LINK (
    LinkID tinyint NOT NULL PRIMARY KEY AUTO_INCREMENT,
    CategoryID tinyint NOT NULL,
    PostID tinyint NOT NULL, 
    foreign key (CategoryID) references POST_CATEGORY(CategoryID),
    foreign key (PostID) references BLOG_POSTS(PostID)
);

CREATE TABLE COMMENTS (
    CommentID tinyint NOT NULL PRIMARY KEY AUTO_INCREMENT,
    PostID tinyint NOT NULL, 
    UserID tinyint NOT NULL, 
    Comment text NOT NULL,
    foreign key (PostID) references BLOG_POSTS(PostID),
    foreign key (UserID) references USER_TABLE(UserID)
);

INSERT INTO POST_CATEGORY (Category) VALUES 
    ('Embroidery'),
    ('Macramé'),
    ('Spinning'),
    ('Tatting'),
    ('Weaving'),
    ('Knitting'),
    ('Crochet'),
    ('Felting'),
    ('Stitch'),
    ('Applique'),
    ('Paper marbling'),
    ('Origami'),
    ('Papermaking'),
    ('Cast paper'),
    ('Decoupage'),
    ('Papercutting'),
    ('Iris folding'),
    ('Paper embossing'),
    ('Bookbinding'),
    ('Quilling'),
    ('Papier mâché'),
    ('Paper model'),
    ('Parchment craft'),
    ('Calligraphy'),
    ('Scrapbooking'),
    ('Cross-stitch'),
    ('Zine-making'),
    ('Musical crafts'),
    ('Print-making');