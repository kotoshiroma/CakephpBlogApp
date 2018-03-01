CREATE TABLE categories (
  id int unsigned auto_increment primary key,
  category_name varchar(50),
  created DATETIME DEFAULT NULL,
  modified DATETIME DEFAULT NULL
);


alter table posts add category_id INT(11);


CREATE TABLE tags (
  id INT unsigned NOT NULL auto_increment primary key,
  tag_name varchar(50)
);

insert into tags (tag_name) values ('TagA');
insert into tags (tag_name) values ('TagB');
insert into tags (tag_name) values ('TagC');


CREATE TABLE posts_tags (
  post_id int(10) unsigned NOT NULL default 0,
  tag_id int(10) unsigned NOT NULL default 0,
  PRIMARY KEY (post_id,tag_id)
);

CREATE TABLE images (
    id int(10) unsigned NOT NULL auto_increment PRIMARY KEY,
    post_id int(11) NOT NULL,
    file_name varchar(255) NOT NULL,
    dir varchar(255) DEFAULT NULL,
    type varchar(255) DEFAULT NULL,
    size int(11) DEFAULT 0,
    active tinyint(1) DEFAULT 1
);
