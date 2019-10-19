CREATE TABLE "group_member" ("member_id"  serial PRIMARY KEY, "num_one" varchar, "num_two" varchar, "num_three" varchar, "least_favorite" varchar, "username" varchar, "group_id" varchar); 

CREATE TABLE "group" (   
    "group_id"     serial PRIMARY KEY,   
    "choice_one"   varchar,   
    "choice_two"   varchar,   
    "choice_three" varchar); 

ALTER TABLE "groupMember" ADD FOREIGN KEY ("group_id") REFERENCES "group" ("group_id");



INSERT INTO "group" (group_id, choice_one, choice_two, choice_three) VALUES ('123456', 'choiceOne', 'choiceTwo', 'choiceThree');

INSERT INTO "group_member" (num_one, num_two, num_three, least_favorite, username, group_id) VALUES ('McDonalds', 'Little Cesars', 'Jimmy Johns', 'Wendys', 'James', '123456');
INSERT INTO "group_member" (num_one, num_two, num_three, least_favorite, username, group_id) VALUES ('Dominos', 'Five Guys', 'Arbys', 'Subway', 'Greg', '123456');
INSERT INTO "group_member" (num_one, num_two, num_three, least_favorite, username, group_id) VALUES ('Olive Garden', 'Hickory', 'Papa Johns', 'Dominos', 'Lisa', '123456');
INSERT INTO "group_member" (num_one, num_two, num_three, least_favorite, username, group_id) VALUES ('Arbys', 'Panda Express', 'Hickory', 'McDonnalds', 'Chase', '123456');