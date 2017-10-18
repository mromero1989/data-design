CREATE TABLE profile (
	profileId BINARY(16) NOT NULL,
	profileActivationToken CHAR(32),
	profileAtHandle VARCHAR(32) NOT NULL,
	profileEmail VARCHAR(128) NOT NULL,
	profileHash CHAR(128) NOT NULL,
	profilePhone VARCHAR(32),
	profileSalt CHAR(64) NOT NULL,
	UNIQUE(profileEmail),
	UNIQUE(profileAtHandle),
	PRIMARY KEY(profileId)
);

CREATE TABLE comment (
	commentId BINARY(16) NOT NULL,
	commentProfileId BINARY(16) NOT NULL,
	commentContent VARCHAR(140) NOT NULL,
	commentDate DATETIME(6) NOT NULL,
	INDEX(commentProfileId),
	FOREIGN KEY(commentProfileId) REFERENCES profile(profileId),
	PRIMARY KEY(commentId)
);

INSERT INTO
	profile(profileId, profileActivationToken, profileAtHandle, profileEmail, profileHash, profilePhone, profileSalt)
	VALUES
		(UNHEX(REPLACE("e34cb088-3d83-4620-a363-5d1a10617379", "-", "")), "b8ae3c450969e13601b1b47aa6a7e488", "mromero308", "mromero308@cnm.edu", "854d1539fe105bf35aacb1ac8f5c0882acfa9a109a3664e4002a7f279460b54b158dca5f6a62d859925523279fcd7ae7cca4c53d4b071ea07ad28b508884adf4", "+5059171406", "3650b6eac8d67f6b02eb629939daf1c00c642758059769ac28ef67ff71d91c90"
		);

DELETE FROM profile
WHERE profileAtHandle LIKE "%mromero%";

UPDATE profile
SET profileEmail = "mromero308@cnm.edu"
WHERE profileId = "e34cb088-3d83-4620-a363-5d1a10617379";

SELECT profileId, profileAtHandle, profilePhone
FROM profile
WHERE profileId = "e34cb088-3d83-4620-a363-5d1a10617379";

