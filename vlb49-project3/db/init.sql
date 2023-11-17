--

/**users**/
CREATE TABLE users (
    id INTEGER NOT NULL UNIQUE,
    username TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    PRIMARY KEY(id AUTOINCREMENT)
);


INSERT INTO users (id, username, password)
VALUES (1, 'valerie', '$2y$10$QtCybkpkzh7x5VN11APHned4J8fu78.eFXlyAMmahuAaNcbwZ7FH.');


CREATE TABLE sessions (
  id INTEGER NOT NULL UNIQUE,
  user_id INTEGER NOT NULL,
  session TEXT NOT NULL UNIQUE,
  last_login TEXT NOT NULL,
  PRIMARY KEY(id AUTOINCREMENT) FOREIGN KEY(user_id) REFERENCES users(id)
);





/**genre tags**/
CREATE TABLE genres (
    id INTEGER NOT NULL UNIQUE,
    genre_name TEXT NOT NULL,
    PRIMARY KEY(id AUTOINCREMENT)
);

INSERT INTO
    genres (id, genre_name)
VALUES
    (1, 'Pop');

INSERT INTO
    genres (id, genre_name)
VALUES
    (2, 'Hip Hop');

INSERT INTO
    genres (id, genre_name)
VALUES
    (3, 'Alternative Hip Hop');

INSERT INTO
    genres (id, genre_name)
VALUES
    (4, 'R&B');

INSERT INTO
    genres (id, genre_name)
VALUES
    (5, 'Trap');

INSERT INTO
    genres (id, genre_name)
VALUES
    (6, 'Jazz');

INSERT INTO
    genres (id, genre_name)
VALUES
    (7, 'Rock');

INSERT INTO
    genres (id, genre_name)
VALUES
    (8, 'Alternative Indie');

INSERT INTO
    genres (id, genre_name)
VALUES
    (9, 'Psychedelic');


/**albums**/
CREATE TABLE albums (
    id INTEGER NOT NULL UNIQUE,
    title TEXT NOT NULL,
    artist TEXT NOT NULL,
    num_songs INTEGER NOT NULL,
    reldate TEXT NOT NULL,
    descr TEXT NOT NULL,
    PRIMARY KEY(id AUTOINCREMENT)
);


INSERT INTO
    albums (id, title, artist, num_songs, reldate, descr)
VALUES
    (1, 'Astroworld', 'Travis Scott', 17, "August, 08, 2018", "The album title is named after the defunct theme park Six Flags AstroWorld, which was located in Houston, Texas prior to its closure in 2005. In a 2017 interview with GQ, Scott spoke on the title of the album: 'They tore down AstroWorld to build more apartment space. That's what it's going to sound like, like taking an amusement park away from kids. We want it back. We want the building back. That's why I'm doing it. It took the fun out of the city.'It won Album of the Year at the 2019 BET Hip Hop Awards. The album was named one of the best albums of 2018 and the decade by several publications.");

INSERT INTO
    albums (id, title, artist, num_songs, reldate, descr)
VALUES
    (2, 'Luv is Rage 2', 'Lil Uzi Vert', 7, 'August 25, 2017', "Luv Is Rage 2 is the debut studio album by American rapper Lil Uzi Vert. It was released through Generation Now and Atlantic Records. The album serves as a sequel to Uzi's commercial debut mixtape Luv Is Rage (2015). It features guest appearances from The Weeknd and Pharrell Williams. In November 2016, Lil Uzi Vert initially announced Luv Is Rage 2 that would suffer from numerous delays amid confusion.");

INSERT INTO
    albums (id, title, artist, num_songs, reldate, descr)
VALUES
    (3, 'DAMN.', 'Kendrick Lamar', 14, 'April 14, 2017', "The album has been categorized as conscious hip hop, a genre Lamar incorporated on his previous studio album, To Pimp a Butterfly. The album also incorporates elements of trap, contemporary R&B, and pop. Lamar has said in interviews that the ability to play the album in reverse tracklist order was 'premeditated ... in the studio': 'It plays as a full story and even a better rhythm. It's one of my favorite rhythms and tempos within the album'.");

INSERT INTO
    albums (id, title, artist, num_songs, reldate, descr)
VALUES
    (4, 'A Beautiful Lie', 'Thirty Seconds to Mars', 12, 'August 30, 2005', "A Beautiful Lie differs notably from the band's self-titled debut album, both musically and lyrically. Whereas the eponymous concept album's lyrics focus on human struggle and astronomical themes, A Beautiful Lie's lyrics are personal and less cerebral.");

INSERT INTO
    albums (id, title, artist, num_songs, reldate, descr)
VALUES
    (5, 'AT.LONG.LAST.A$AP', 'A$AP Rocky', 18, 'May 26, 2015', "After performing at the 2015's South by Southwest (SXSW) festival, ASAP Rocky revealed to Billboard, that the title to his second album would be A.L.L.A..[11] On March 26, 2015, in an interview with GQ, Rocky deciphered the album's title: I'm claiming ownership of my legacy. Look at it: At.Long.Last.A$AP. A-L-L-A. Like slang for 'Allah.' It's the return of the god MC. I'm named after Rakim, and I'm finally facing what it means: I was born to do this shit. And I hope I get to do it for a very long time.");


INSERT INTO
    albums (id, title, artist, num_songs, reldate, descr)
VALUES
    (6, 'Take Care', 'Drake', 18, 'November 15, 2011', "The album expands on the low-tempo, sensuous, and dark sonic aesthetic of Thank Me Later. It incorporates several elements that have come to define Drake's sound, including minimalist R&B influences, existential subject matter, and alternately sung and rapped vocals. It features a mixture of braggadocio and emotional lyrics, exploring themes of fame, romance, and wealth. The album also highlights other topics, such as Drake's relationships with friends and family, as well as touching on sex and narcissism.");

INSERT INTO
    albums (id, title, artist, num_songs, reldate, descr)
VALUES
    (7, 'Blonde', 'Frank Ocean', 17, 'August 20, 2016', "Frank Ocean notably makes use of pitch shifted vocals. The Beach Boys' de facto leader Brian Wilson is recognized as a strong influence on the album's lush arrangements and layered vocal harmonies, while the guitar and keyboard rhythms on the album are considered as languid and minimal. The album's themes surrounds Ocean dealing with his masculinity and emotions, inspired by sexual experiences, heartbreak, loss and trauma.");

INSERT INTO
    albums (id, title, artist, num_songs, reldate, descr)
VALUES
    (8, 'ERYS', 'Jaden', 17, 'July 5, 2019', "Erys picks up where Jaden Smith left off with the conclusion of Syre the story of a boy who is obsessed with chasing the sunset and until one day it chased him, and it ends up killing him. Erys is a now resurrected part of Syre. The album revolves around Erys and portrays him as a boy whose ego has gotten the best of him. During the album he's portrayed as an ill-mannered person who some might say is the exact opposite of Syre.");

INSERT INTO
    albums (id, title, artist, num_songs, reldate, descr)
VALUES
    (9, 'Yeezus', 'Kanye West', 10, 'June 18, 2013', "West was influenced primarily by minimalist design and architecture during the production of Yeezus, and visited a furniture exhibit in the Louvre five times. West applied the situation to his own life, feeling that visionaries can be misunderstood by their unenlightened peers. West also wanted a deep hometown influence on the album, and listened to 1980s house music most associated with his home city of Chicago for influence. The album was originally titled Thank God for Drugs.");

INSERT INTO
    albums (id, title, artist, num_songs, reldate, descr)
VALUES
    (10, 'Currents', 'Tame Impala', 13, 'July 17, 2015', "The album's change in style has root in several events. Kevin Parker (member) began to feel that even songs outside the psychedelic genre could possess its qualities; he made this assumption while under the influence of psychedelic mushrooms and cocaine and listening to the Bee Gees' 'Stayin' Alive'. At some point, Parker broke up with his girlfriend, French singer-songwriter Melody Prochet, and moved from Paris back to his hometown of Perth. According to Parker, 'the only rule was to make an attempt to abandon the rules that I've set up in the past.' This included toying with things he considered musically 'cheesy' or taboo, including drum machines and various effects.");

INSERT INTO
    albums (id, title, artist, num_songs, reldate, descr)
VALUES
    (11, 'Anti', 'Rihanna', 13, 'January 28, 2016', "The album's lyrical content predominantly touches upon themes of relationships, exploring what it means to be in love, to get hurt, to need someone, and to be true to yourself. The theme of relationships is picked up in numerous songs; 'Kiss It Better' sees Rihanna questioning how far an ex-lover will go to get her back; in 'Woo', Rihanna turns spiteful, stating she does not care for her ex-partner, while 'Never Ending' features Rihanna admitting she would like to be in love again. The album's themes were also noted as being unapologetic, with an uncaring attitude, and self-assurance. Rihanna continued to state that with Anti she wanted to focus on music that 'felt real' and soulful and would be timeless.");

INSERT INTO
    albums (id, title, artist, num_songs, reldate, descr)
VALUES
    (12, 'Die Lit', 'Playboi Carti', 19, 'May 11, 2018', "Evan Rytlewski of Pitchfork stated that Die Lit is 'an album that works almost completely from its own lunatic script. It is a perversely infectious sugar high, rap that fundamentally recalibrates the brain's reward centers', praising the production and simplicity. Die Lit received generally positive reviews from critics and debuted at number three on the US Billboard 200.");





/** album_tags **/

CREATE TABLE album_tags (
    id INTEGER NOT NULL UNIQUE,
    album_id INTEGER NOT NULL,
    genre_id INTEGER NOT NULL,
    PRIMARY KEY(id AUTOINCREMENT)
    FOREIGN KEY(album_id) REFERENCES albums(id)
    FOREIGN KEY(genre_id) REFERENCES genres(id)
);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (1, 1, 3);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (2, 1, 5);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (3, 1, 9);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (4, 2, 5);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (5, 2, 1);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (6, 3, 2);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (7, 3, 4);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (8, 4, 8);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (9, 4, 7);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (10, 5, 2);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (11, 5, 3);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (12, 6, 2);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (13, 6, 4);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (14, 7, 4);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (15, 7, 9);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (16, 8, 2);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (17, 8, 5);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (18, 9, 2);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (19, 9, 3);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (20, 10, 9);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (21, 10, 4);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (22, 11, 1);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (23, 11, 4);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (24, 12, 2);

INSERT INTO album_tags (id, album_id, genre_id)
VALUES (25, 12, 5);
