CREATE TABLE profile (
	profileId              BINARY(16)   NOT NULL,
	profileActivationToken CHAR(32),
	profileAtHandle        VARCHAR(32)  NOT NULL,
	profileEmail           VARCHAR(128) NOT NULL,
	profileHash            CHAR(128)    NOT NULL,
	profilePhone           VARCHAR(32),
	profileSalt            CHAR(64)     NOT NULL,
	UNIQUE (profileEmail),
	UNIQUE (profileAtHandle),
	PRIMARY KEY (profileId)
);

CREATE TABLE post (
	postId        BINARY(16)   NOT NULL,
	postProfileId BINARY(16)   NOT NULL,
	postContent   VARCHAR(140) NOT NULL,
	postDate      DATETIME(6)  NOT NULL,
	INDEX (postProfileId),
	FOREIGN KEY (postProfileId) REFERENCES profile (profileId),
	PRIMARY KEY (postId)
);

CREATE TABLE comment (
	commentProfileId BINARY(16)  NOT NULL,
	commentPostId    BINARY(16)  NOT NULL,
	commentDate      DATETIME(6) NOT NULL,
	INDEX (commentProfileId),
	INDEX (commentPostId),
	FOREIGN KEY (commentProfileId) REFERENCES profile (profileId),
	FOREIGN KEY (commentPostId) REFERENCES post (postId),
	PRIMARY KEY (commentProfileId, commentPostId)
);


