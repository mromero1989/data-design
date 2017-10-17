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

