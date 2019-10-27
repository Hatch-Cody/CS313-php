DROP TABLE "group_member";
DROP TABLE "group";

CREATE TABLE "group_member" (
    "member_id"      serial PRIMARY KEY, 
    "num_one"        varchar, 
    "num_two"        varchar, 
    "num_three"      varchar, 
    "least_favorite" varchar, 
    "username"       varchar, 
    "group_id"       varchar); 

CREATE TABLE "group" (   
    "group_id"     varchar PRIMARY KEY,   
    "choice_one"   varchar,   
    "choice_two"   varchar,   
    "choice_three" varchar,
    "timestamp"    timestamp);

ALTER TABLE "group_member" ADD FOREIGN KEY ("group_id") REFERENCES "group" ("group_id");



INSERT INTO "group" (group_id, choice_one, choice_two, choice_three) VALUES ('1a2v3f', 'choiceOne', 'choiceTwo', 'choiceThree');

INSERT INTO "group_member" (num_one, num_two, num_three, least_favorite, username, group_id) VALUES ('McDonalds', 'Little Cesars', 'Jimmy Johns', 'Wendys', 'James', '1a2v3f');
INSERT INTO "group_member" (num_one, num_two, num_three, least_favorite, username, group_id) VALUES ('Dominos', 'Five Guys', 'Arbys', 'Subway', 'Greg', '1a2v3f');
INSERT INTO "group_member" (num_one, num_two, num_three, least_favorite, username, group_id) VALUES ('Olive Garden', 'Hickory', 'Papa Johns', 'Dominos', 'Lisa', '1a2v3f');
INSERT INTO "group_member" (num_one, num_two, num_three, least_favorite, username, group_id) VALUES ('Arbys', 'Panda Express', 'Hickory', 'McDonnalds', 'Chase', '1a2v3f');