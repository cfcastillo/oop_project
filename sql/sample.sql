

INSERT INTO author(authorId, authorActivationToken, authorAvatarUrl, authorEmail, authorUsername)
VALUES(:authorId, :authorActivationToken...)

INSERT INTO author(authorId, authorActivationToken, authorAvatarUrl, authorEmail, authorUsername)
VALUES(UNHEX('79fb2616-c2b3-41eb-9182-ebd21c404558'), 'a big activation token', 'https://myavatar.com','cfiniello@cnm.edu', 'cfiniello')



UPDATE author
SET authorActivationToken = :authorActivationToken,
	authorAvatarUrl = :authorAvatarUrl,
	authorEmail =
WHERE authorId = someauthorid



DELETE
FROM author
WHERE authorId = someauthorid

SELECT authorId, authorActivationToken, authorAvatarUrl, authorEmail, authorUsername
FROM author
WHERE authorId = someauthorid