CREATE TABLE "user" (
  "id" int
);

CREATE TABLE "notes" (
  "noteId" int,
  "speaker_id" varchar,
  "conference_id" varchar,
  "id" int
);

CREATE TABLE "speakers" (
  "speaker_id" int
);

CREATE TABLE "conference" (
  "year" int,
  "month" int,
  "conference_id" varchar
);

ALTER TABLE "notes" ADD FOREIGN KEY ("speaker_id") REFERENCES "speakers" ("speaker_id");

ALTER TABLE "notes" ADD FOREIGN KEY ("conference_id") REFERENCES "conference" ("conference_id");

ALTER TABLE "notes" ADD FOREIGN KEY ("id") REFERENCES "user" ("id");
