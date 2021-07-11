/** BDD simplon **/
DROP DATABASE IF EXISTS simplon;
CREATE DATABASE simplon;
USE simplon;

/** Table topic **/
CREATE TABLE topic( 
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL, 
    title VARCHAR(64) NOT NULL
);

/** Table post **/
CREATE TABLE post(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    content VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    date DATETIME
);


create table topic_post
(
  post_id int,
  topic_id int,

  CONSTRAINT post_cat_pk PRIMARY KEY (post_id, topic_id),

  CONSTRAINT FK_post FOREIGN KEY (post_id) REFERENCES post (id),

  CONSTRAINT FK_topic FOREIGN KEY (topic_id) REFERENCES topic (id)
);