CREATE TABLE USER_TABLE (
    UserID tinyint NOT NULL PRIMARY KEY AUTO_INCREMENT,
    UserType enum("Member","Writer","Administrator") DEFAULT "Member",       
    Username varchar(100) NOT NULL UNIQUE,
    ProfilePhoto varchar(100),
    FirstName varchar(100) NOT NULL,
    LastName varchar(100) NOT NULL,
    EmailAddress varchar(100) NOT NULL, 
    User_Password varchar(100)
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
    PostStatus tinyint(1) NOT NULL COMMENT '1=Published | 0=Not published',
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
    

INSERT INTO USER_TABLE (UserType, Username, FirstName, LastName, EmailAddress) VALUES
    ('Administrator', 'Bessinabout', 'Bess', 'Martin', 'bess@gmail.com'),
    ('Administrator', 'QueenGabby', 'Gabby', 'Virbasiute', 'gabby@gmail.com'),
    ('Administrator', 'MariaF', 'Maria', 'Flanagan', 'maria@gmail.com'),
    ('Administrator', 'AmyR', 'Amy', 'Robinson', 'Amy@gmail.com'),
    ('Administrator', 'SandyF', 'Sandy', 'Forrester', 'sandy@gmail.com'),
    ('Writer', 'TheRyan', 'Ryan', 'Gosling', 'ryan@gmail.com'),
    ('Writer', 'TheTrainer', 'Martina', 'Yusuf', 'martina@gmail.com'),
    ('Member', 'SammyStitch', 'Sam', 'Samuel', 'sam@gmail.com');


INSERT INTO BLOG_POSTS (UserID, Title, Blurb, MainImage, Content, DifficultyRating, Created) VALUES 
    ('1', 'How-To: Satin Stitch for Hand Embroidery', "How do I solidly fill in a shape? And how long can I make my stitches? And what if they don't look nice around the edges and I cry?  Whoa now. You can fill up a shape with stitches any number of ways (concentric split stitches, random straight stitches, fill it with French knots), but a satin stitch is a good method to know. (Doesn't have to actually be worked in or on satin, fyi.)", "images/Satin.jpg", "Satin stitching can require some finesse, but don't let that stop you. Let's not get too hung up on it looking perfect, okay? Okay... Step 1: Let's say you have a space on your pattern you want to fill in. Like this.

Step 2: Start by bringing your needle up from behind your hoop, along the pattern line.
TIP: I think it's easier to start in the middle of the shape and work outward toward each end. Imagine if this were a circle: spanning the diameter first is much easier than trying to start at the outer edge.

 Step 3: Re-insert your needle directly across from your last exit point. You'll be making stitches that span all the way across the shape. See where I'm going with this?

Step 4: Pull the floss all the way through, and there you have your first stitch in the process! Okay, now pay close attention to this next, important step. Step 5: Start your next stitch across from, but not next to, the end of your last stitch. You'll do this every time. Don't try to make your next stitch come up right beside the end of the last one -there won't be enough fabric in between, and you'll have a little gap of fabric peeking through each stitch, when we want them as close to side-by-side as possible. 

Step 6: '1' is where you first came up, '2' is where you went back down, '3' is where you'll come up again next, '4' is where you go back down again...and repeat. Your next stitch will always start across from the end of the last one. This also means that the back of your fabric will look the same as the front! Step 7: Then have at it! Stitch toward one end, getting smaller and smaller...yes, it can get tricky. Especially around the bend. Don't give up!

Step 8: Finish the other half! It will probably look really terrible to you, because you've been looking intensely at it, inches away from your nose. Stop looking at it. Set it down, forget about it, and then pick it up again later. I bet you will be surprised by how nice it looks!

Working this way (doing the shape half-and-half) is just a personal preference of mine. You can instead start your first stitch at either end with the smallest point. I discovered that I get neater results if I work this way. 

Wanna see what it can really look like?", 'Beginner', current_timestamp()),

("2", "A Step by Step Guide on How to Make a Bohemian Macramé Bag", "Looking to learn how to make your very own macramé bag? One that you can use to carry books? or fruits and vegetables after a visit to the grocery store? Or perhaps you were looking to wear something fashionable that’s hip and trendy to your favourite outdoor music festival? In this blog post, I share how you can create your very own stylish boho-chic macramé bag for as little as $20, that you can make in a few hours.",
"imges/macrame.jpg", "Macrame Bag Materials You Will Need
Before we begin making this macrame bag you will need a few supplies. There is nothing overly expensive, so you don’t need to worry about the cost.

I try to keep the cost of materials and supplies down as much as possible, without sacrificing quality to help me save and use all my materials wisely.

You will need to gather yourself:

Macrame Cord & Materials
5 mm single-strand cotton cord. (I use 5mm single strand cord because it is thicker in rope. This will allow the bag to be strong and hold more in weight.)
Crafting glue
Crochet hook (to close the bottom of the bag)
Length of Cords to be Cut:
2 x 150cm (60 inches)
12 x 220cm (87 inches)
12 x 150cm (60 inches)
1 x 60cm (24 inches)
Knots Used in This Project:
Lark’s Head Knot
Berry Knot
Alternating Square Knot
Gathering Knot
Estimated Time for Project:
1-2 hours
Making the Bottom of the Macrame Bag
Contrary to common belief, making a macrame bag, we start from the bottom. We start constructing the base then we upwards from there.

To begin, you will start off with 2 strands of 150 cm cords. Take one, fold it in half, and place it horizontally downwards with the loop on one end. 

Then, take the second strand of 150 cm cord, fold it in half, and place the loop horizontally, on the opposite end. 

So as you can see, we have 2 horizontal rows here. The top row will form the backside of the bag, and the bottom row will form the front side.", "Intermediate", current_timestamp());

INSERT INTO POST_CATEGORY_LINK (CategoryID, PostID) VALUES ('1', '1'), ('2', '2');
