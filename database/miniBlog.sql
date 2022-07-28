/* Script pour la création des tables */

BEGIN;

DROP TABLE IF EXISTS comment;
DROP TABLE IF EXISTS post;

/* Post */
CREATE TABLE post (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  create_date DATETIME NOT NULL,
  title VARCHAR(100) NOT NULL,
  content VARCHAR(400) NOT NULL
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/* Comment */
CREATE TABLE comment (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  create_date DATETIME NOT NULL,
  author VARCHAR(100) NOT NULL,
  content VARCHAR(200) NOT NULL,
  post INTEGER NOT NULL,
  CONSTRAINT fk_comment_post FOREIGN KEY(post) REFERENCES post(id)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

/* Insert post */
INSERT INTO post(create_date, title, content) VALUES (NOW(), 'Premier billet', 'Bonjour monde ! Ceci est le premier billet sur mon blog.');
INSERT INTO post(create_date, title, content) VALUES (NOW(), 'Au travail', 'Il faut enrichir ce blog dès maintenant.');

/* Insert comment */
INSERT INTO comment(create_date, author, content, post) VALUES (NOW(), 'A. Nonyme', 'Bravo pour ce début', 1);
INSERT INTO comment(create_date, author, content, post) VALUES (NOW(), 'Moi', 'Merci ! Je vais continuer sur ma lancée', 1);

COMMIT;
