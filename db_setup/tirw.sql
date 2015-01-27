-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2015 at 04:32 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tirw`
--
CREATE DATABASE IF NOT EXISTS `tirw` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tirw`;

-- --------------------------------------------------------

--
-- Table structure for table `soRandom`
--

DROP TABLE IF EXISTS `soRandom`;
CREATE TABLE IF NOT EXISTS `soRandom` (
`sr_ID` int(11) NOT NULL,
  `sr_narrator` varchar(12) NOT NULL DEFAULT '',
  `sr_type` varchar(8) NOT NULL DEFAULT '',
  `sr_keywords` mediumtext NOT NULL,
  `sr_text` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=latin1 COMMENT='soRandom short story elements';

--
-- Dumping data for table `soRandom`
--

INSERT INTO `soRandom` (`sr_ID`, `sr_narrator`, `sr_type`, `sr_keywords`, `sr_text`) VALUES
(1, 'julian', 'p1', '', 'I got one lady, she''s like the day I learned to drive: Everytime I see her it just makes my day. She might ride once, twice in a week, in the mornings. She works at some hospice up the road, I think. She''s got a face like a nurse, walks like a nurse, wears a pen on a little rope around her neck like a nurse.'),
(2, 'julian', 'p2', '', 'So I pick up Nurse Lady one day and everything is normal, right. Chuckie''s in the co-pilot seat and there''s some kids on the back going to school, but mostly the bus is kind of empty and pretty quiet. Nurse Lady gets on at the corner of Kenmore and Colvin, and I guess in hindsight I might have seen something coming because the box wouldn''t take her bill. I just waived her on and said she could catch up with me next time. She was one of my favorites.'),
(3, 'julian', 'p3', '', 'We''re rolling down Kenmore Westbound and I notice this guy on the bus, with a Sabres sweatshirt on, and he''s kind of yelling towards this girl who might be, what, 15 or something? She''s one of them kids with the white headphones and her pants aren''t tall enough. I don''t try to be judging and all, but you just notice things. Like this guy is harrassing this girl and she''s pretending not to hear him. She can hear him. I know if I called her stop, even without them new signs, she''d hear me.'),
(4, 'julian', 'p4', '', 'I get on the intercom and tell Sabres that he''s got to settle down. "Settle down there," I say, "Settle down and leave that gal alone. She don''t need no bother."'),
(5, 'julian', 'p5', '', 'Sabres moves back down the aisle towards them schoolboys who was back there. They get rowdy sometimes, but mostly they are good boys. They all ride the bus all the way to some after-school program out by the university, I think. They seem fine and all.'),
(6, 'julian', 'p6', '', 'I get up to Elmwood and Delaware and I''ve picked up maybe three or four more fares. Some guy who rides pretty regular but keeps to himself. He always carries this bright yellow bag. I notice it because it''s really yellow. It gets Chuckie all excited everytime he rides, and Chuckie gets all excited over all kinds of things, but I gotta say, this guy keeps his bag mighty yellow. It don''t ever seem to fade or get dirty.'),
(7, 'julian', 'p7', '', '"Wow! That bag is yellow," Chuckie says. "Where did you get it?"\r\n\r\nThe guy with the yellow bag just moves on past Chuckie like he always does.\r\n\r\n"Wow, Julian. Did you see that? Wow!"\r\n\r\nI gotta laugh because that man''s bag is just so yellow. \r\n\r\n"I''m gonna find out where he got that bag. I gotta get a bag like that. Wow!" Chuckie gets up to follow the guy back.\r\n\r\n"Chuckie, you leave that man be. Your stop is coming up soon here."\r\n'),
(8, 'julian', 'p8', '', 'We make the turn onto Niagara and I notice the Sabres guy is still standing in the back talking to the boys. The girl is looking out the window; she doesn''t get off until Riverside. And mostly everything is pretty quiet.'),
(9, 'julian', 'p9', '', 'We get to Chuckie''s stop at the Goodwill and he gets off. Just as he''s leaving the bus I hear a scream and I see in the mirror the Sabres guy and he''s on the floor in the aisle. Nurse Lady is hollerin'' for me to stop the bus. So I do.'),
(10, 'julian', 'p10', '', 'I don''t know nothing about first aid, and the Nurse Lady was there, so I just called into dispatch and told them to get an ambulance to us. The Nurse Lady actually took care of him real well. She got him laying down. I guess he was breathing, because I don''t recall that she gave him mouth-to-mouth or anything.'),
(11, 'julian', 'p11', '', 'It worked out OK, I guess. I helped the paramedics get him off the bus. The other fares sat until the D came up and they all got vouchers so they seemed pretty happy. I remember seeing Chuckie in the parking lot for awhile, just standing and looking at the bus, but by the time the ambulance got there he was gone.'),
(12, 'julian', 'p12', '', 'Sabres recovered. It wasn''t a heart attack - it was some kind of head thing, I think. Like brain thing. But apparently it wasn''t too bad, which seems to me like any brain thing would be pretty bad, but whatever they say. I ain''t seen him around, so I don''t know.'),
(13, 'theresa', 'p1', '', 'Oh my God, I can''t believe the kind of bullshit that I have to go through every God damned day. I''m on my feet all day long, taking care of people''s disgusting shit and piss and nastiness and all that nasty shit. And then I have to take the goddamned bus. I can''t believe this shit.'),
(14, 'theresa', 'p2', '', 'At least it''s the good busdriver. Most of these idiots run so late you wouldn''t believe it. You just want to scream at the top of your lungs, it''s such bullshit.'),
(15, 'theresa', 'p3', '', 'I''m reading my paper and trying to think about what I''m going to have for dinner. I used to be able to eat those Lean Cuisine dinners like every night, but lately they''ve been shit. I don''t know if it''s me or the dinners, but one of us has been shit lately.'),
(16, 'theresa', 'p4', '', 'I can''t really think about dinner because some man in a Sabres jersey is bothering this little girl sitting near me. She''s pretending not to hear him, but she gotta hear him. He''s almost yelling. What a fuckhead. I''m sorry, but that''s a shitty way to behave.'),
(17, 'theresa', 'p5', '', 'Just when he''s asking her for like the twelfth time if she''s got a quarter for the transfer, Bus Driver yells at him to sit down. He''s a fuckhead, but he does go and turn his attention to some kids sitting in the back of the bus.'),
(18, 'theresa', 'p6', '', 'The bus is getting crowded as more people get on. They all look like they''re going to shitty jobs. Coming home from shitty jobs, I guess. Going to shitty homes. There''s this retard who laughs real hard at this little guy getting on the bus. Not little like little people little, but you know, little like short and shit.'),
(19, 'theresa', 'p7', '', 'The little guy looks real bothered by the retard. It''s hilarious. He sits all close to the back, but then the Sabres guy starts harrassing him for a quarter. I watch the little man kind of quiver a little, and Sabres guy gets a weird look on his face. The little guy fumbles inside this God-awful fucking bag and pulls out a quarter. He hands it over to Sabers guy, but then drops it or something. I dunno, I wasn''t watching.'),
(20, 'theresa', 'p8', '', 'Sabres guy bends over to pick up the quarter. He straightens up and then, I swear to fucking God, I saw him mouth the word "shit" and then he just fell on his face. Straight forward into the ground, and I thought to myself, "Shit. That must have hurt." You could hear his teeth crack together when he hit.'),
(21, 'theresa', 'p9', '', 'These things happen when you''re a nurse. And it''s time''s like this that I just have to say to myself, Theresa, you are a nurse and you have a duty to help this person in front of you.'),
(22, 'theresa', 'p10', '', 'I scream at the bus driver to stop like a fool idiot. I pull the guy out of the aisle into the more open area up front. The retard had already gotten off, so there wasn''t anybody else directly up front.'),
(23, 'theresa', 'p11', '', 'Now, shit, I may be a nurse and all, but I''m not going to risk my life by giving some complete stranger CPR when I''m not on the clock and without a mouthpiece. Half the time those fuckers puke up on you anyway after that kind of shit, and who knows why he passed out? Let the paramedics deal with this shit.'),
(24, 'theresa', 'p12', '', 'Brian and Doug came out with the ambulance. They took care of that guy and I guess he was fine. I mean, how the fuck would I know? Actually, I checked in on him after all that shit happened and he at least got checked out alive. That''s all I care about. He was an asshole anyway.'),
(25, 'conchita', 'p1', '', 'Oh my god, I can''t believe this guy won''t leave me alone. He started out like across the aisle from me and he should stay there. What the hell? It''s like, just go away!'),
(26, 'conchita', 'p2', '', 'It''s so random how people just do things sometimes, y''know? It''s like this kid at school this one time back in fifth grade. God, it seems so long ago, y''know? Like four years. Anyways, he like flipped out one day and just started humming real low. He just sat there humming. Totally random. Humming? What the hell is that? Who hums?'),
(27, 'conchita', 'p3', '', 'I love how when I have my headphones on, it''s like I''m in another world. Like nobody knows I''m listening to them, like it''s all just me and my music, but I can see them and they can''t see me. Like they think I can''t hear them, but I can, if I want, and then I''m like way in charge.'),
(28, 'conchita', 'p4', '', 'This guy will not shut up. What the hell? Go away, mister. No, I will not give you a quarter. I do not have a quarter for you. Now I''m really getting pissed, dude, so just like go away and leave me alone. Can''t anyone else see this shit going on? What the hell? Jeezus.'),
(29, 'conchita', 'p5', '', 'God, finally that guy is gone. I swear to God if he comes back here I''m going to smack him with my Math book. Can you even believe that? I can''t even believe it. I wonder why he left?'),
(30, 'conchita', 'p6', '', 'I turn down my headphones to hear what that guy is saying. He''s talking to that group of guys back there. A couple of them are pretty cute, but I''m a taken woman, and so I''m, like, not even interested. God, I can''t believe he needs a quarter so bad. Like is the bus driver going to chase him out the door? What the hell?'),
(31, 'conchita', 'p7', '', 'I wonder if Jimmy is back from practice? He had to sit out for like six weeks because of his fracture, even though it was just a hair line. That''s gotta be pretty small. Jimmy said he didn''t even realize it until he went in for his school physical and he only did that because you got to. So it was like totally random that this thing just picked up on this teeny tiny hairline fracture. And then it took like six weeks to heal.'),
(32, 'conchita', 'p8', '', 'Christ. OK, this guy has hassled everybody on the bus, I think. Now he''s messing with this weirdo guy who kind of looks like a rat. But not mean, but, you know - like he''s got a real long face with big teeth. Like a rat. That sounds mean. I like his bag, though.'),
(33, 'conchita', 'p9', '', 'But the beggar guy, he''s like wearing this nasty old Sabres sweatshirt. Oh my God, it is so nasty. And he finally begs a quarter off the guy who looks like a rat (but not in a mean way) and then he taps me on the shoulder. I can''t believe it. I jump and get ready to smack him with my textbook, but he kind of straightens up and shows me the quarter like to see that he got one. What the hell?'),
(34, 'conchita', 'p10', '', 'He goes to walk down the aisle and then like stops and stares at this lady. I''m just like, whatever, and hoping he doesn''t come back around me again. I look out the window and I can see the cutest jacket in the window of the Goodwill. It''s like this orange hoody with rainbow stripes across it. It''s got to be from like, I dunno, the ''90s.'),
(35, 'conchita', 'p11', '', 'And that''s when I notice this guy laying on the ground. He''s like face-down and the woman is yelling at the bus driver to stop. What''s totally random is that, like, the bus isn''t even moving, but this woman keeps yelling for the driver to stop. She''s like screaming at him and he''s just like standing there looking down at her but she doesn''t see him. He gets his radio and calls for help, then he opens the door and tells us to get off.\r\n\r\nI go into the Goodwill and grab that jacket. It''s like five dollars. I can''t believe it. I have to hurry, and the lady is distracted because she wants to know what happened on the bus. I tell her some crackhead fainted and she takes that.'),
(36, 'conchita', 'p12', '', 'The D bus gets here and picks us all up who have somewhere else to go. The bus driver and the lady who was helping that guy stick around to help I guess, but the paramedics are there and the guy doesn''t look that bad off.\r\n\r\nI get home like 20 minutes later than I thought, but Jimmy still isn''t back from practice. I guess they must be working extra hard for the game next week. I hope he didn''t have another accident.\r\n'),
(37, 'julian', 't', 'nurse fuck lady heart', 'I kind of have a special love for nurses. She don''t smile or nothing, but I love how she looks with them white shoes. And them white pants. Sometimes the purple flowers on her blouse or umbrella set off the color in her cheeks just so beautifully.'),
(38, 'julian', 't', 'nurse bus lady fuck hospice', 'I open the door and she''s bathed in white light, spilling over her shoulders and around her head. She wears a rain bonnet. It''s cloudy out. She makes me think of my aunt, who was a nurse at Sisters for nearly 35 years. She died last year and since she been gone, well, the house ain''t the same no more.'),
(39, 'julian', 'p9', '', 'We get to Chuckie''s stop at the Goodwill and he gets off. Just as he''s leaving the bus, I hear a scream and I see in the mirror the Sabers guy and he''s falling forwards with a big spray of blood coming out of his back.'),
(40, 'julian', 'p10', '', 'The little guy with the yellow bag holds it off to block the blood spatter. The dark sprays of blood stain the bag almost immediately, leaving it mottled and the regular guy looks like he might hyperventilate. Nurse Lady is pulling tissues out of her purse and pressing them into the base of Sabres'' neck. And she''s screaming at the top of her lungs.'),
(41, 'julian', 'p11', '', '"Stop the bus! Stop the fucking bus!" she yelled. I had no idea nurses talked that way.'),
(42, 'julian', 'p12', '', 'It ends up taking the whole rest of the afternoon to get Sabres and the bus all squared away. Well, they take care of Sabres at the hopital, and I guess the blade missed his spinal cord by like three millionths of an inch or something. So miraculous recovery. It happens, I suppose.'),
(43, 'julian', 'p9', '', 'Chuckie gets off at the Goodwill like he usually does. I don''t pull three feet from the curb before I hear this terrible screaming like somebody''s dying and there''s this thud. I look up in the mirror and Sabers is on the floor in the aisle. Nurse Lady is kneeling over him, doing something.'),
(44, 'julian', 'p10', '', 'It takes me, what, two seconds to stop the bus and stand up. By the time I do, this guy has puked all over the floor. Nurse Lady has him up on his side and is taking his pulse. She tells me to call 911, so I do. Well, I radio in for it.'),
(45, 'julian', 'p11', '', 'It takes the paramedics forever to arrive. First the cops show up, and they aren''t much help. All the other fares transfer onto the D when it comes along. I sit with Nurse Lady and I find out her name is Theresa. She does work at the hospice, but only in addition to her job at Sisters.'),
(46, 'julian', 'p12', '', 'Theresa keeps riding the bus, and eventually I asked her out for coffee on one of our days off. She says she''ll go and we end up having a great time. I tell her I''d like to keep seeing her, so we figure we''ll see what works out.'),
(47, 'julian', 't', 'nurse, Nurse, jobs, disgusting, nastiness, shit, ambulance, paramedics', 'I guess Theresa and my aunt actually worked at Sisters together sometimes. Theresa said mostly they were on different floors, but sometimes if she was picking up an extra shift she''d work with my aunt. What a coincidence? Who would''ve thought it?'),
(48, 'theresa', 'p8', '', 'Sabres guy picks the quarter off the ground, and when he comes up he looks kind of stunned all of a sudden. He falls forward onto the ground, and I notice blood gushing from the side of his head.'),
(49, 'theresa', 'p9', '', 'He''s convulsing, and the blood is going everywhere. I pull the Kleenex out of my purse and try to help stop his bleeding, but I didn''t want to get my hands in there. I mean, when you''re a nurse, everyone expects that you''re going to help out anytime and always just give yourself up. But I didn''t take no oath. Well, I took an oath, but I''m not going to get somebody''s blood who I don''t even know. That stuff is nasty.'),
(50, 'theresa', 'p11', '', 'I scream for the driver to call 911 and he does. He ends up covering the bleeding guy with a blanket and I appreciate that. All of the other folks take off, although some of them stand around rubbernecking outside. It''s disgusting how much blood there is. Disgusting.'),
(51, 'theresa', 'p12', '', 'The paramedics finally get here, and I''m surprised I never met them before. But who knows. There''s lots of paramedics out there I suppose. I miss Maury and the news, and I''m late for my second shift because of all this shit. God fucking dammit.'),
(52, 'theresa', 'p8', '', 'Sabres guy reaches to pick the quarter up off the ground and he kind of stumbles forward, hitting his head on the back of one of the seats. He goes straight down into the ground like a pound of fucking potatoes, I tell you. Skids his face along the floor, and as he does he lets out the most disgusting belch.'),
(53, 'theresa', 'p9', '', 'The guy is face down in a pile of puke like some kind of fucking drunk fucking piece of shit. It''s times like this that I hate looking like a nurse. I don''t even wanna look at him. I kind of stick my foot out and prop him up on his side and I yell for the driver to stop.'),
(54, 'theresa', 'p11', '', 'The driver calls 911 and keeps trying to talk to me. What''s an old man like him want with an old lady like me? Or the other way around, for Christ''s sake? Still, he''s the best busdriver I''ve had for awhile and I figure I oughta stick around until the paramedics come for this drunk Sabers fan.'),
(55, 'theresa', 'p12', '', 'Me and Julian, the busdriver, go out to coffee a few weeks later. You know, if you had told me I was going to find a man on the bus because of some fucking crackhead hobo I would have told you to quit shittin'' me.'),
(56, 'conchita', 'p10', '', 'Then all of a sudden the homeless looking guy is lying in the aisle. At first I think he''s just laying there, but then I can see the rat-looking guy (that sounds so mean!) is all covered with blood and his bag is all soaked like as if some kind of blood just spurted out at him.'),
(57, 'conchita', 'p11', '', 'The guy is on the floor going all wiggy and shit, and I''m like so lucky I''m not all covered with blood like the guy across the bus. Like that would be so traumatic. I can''t even believe that. Oh my god. I would just die.'),
(58, 'conchita', 'p12', '', 'The nurse gets down on the floor with him, and the bus driver brings a blanket. The driver tells us to get off the bus through the back entrance, so I do. I think about going to get that cute jacket in the Goodwill, but I decide I need to get home and wait for Jimmy to call. He should be back from practice anytime.'),
(59, 'conchita', 'p10', '', 'I hear the guy in the nasty Sabres jersery fall down in the aisle between the seats, and everyone kind of jumps. The boys run up and crowd the guy until he starts puking into the floor.'),
(60, 'conchita', 'p11', '', 'He kind of rolls up onto his side and the nurse lady like puts out her foot like she''s gonna kick him for a second, but then he just kind of rests against it. It''s so weird. Like, we''re all just staring at this guy on the ground and it''s disgusting.'),
(61, 'conchita', 'p12', '', 'Once the smell hits we all get out of the bus. The D comes along and I end up making it home only like 20 minutes late. I call Jimmy but he hasn''t come home from practice yet. I don''t know why he would be late. I guess he''s working hard to make up for his time out. I hope he didn''t have another accident.'),
(62, 'julian', 't', 'mornings, day, ride, bus, drive, stop, job', 'Some mornings start out real cold and you almost can''t stand to open that door. I tell you, some mornings I''m just huddled up with a blanket wrapped around me in the seat. If I''m driving one of the replacement units, I gotta bring my little heater, too. It gets cold sometimes.'),
(63, 'julian', 't', 'Niagara, shit, job, dinner, heart', 'Once we get past Niagara we go onto Vulcan proper and past all of the factories and some rundown taverns and pizza parlors. There used to be three pizza parlors and two bars on every corner, plus a liquor shop downstairs. I don''t know. I suppose people might feel worse about things, except that nobody I know remembers when this area was doing any good. As far as I know, though, Riverside ain''t the worst off. I seen worse on the Lower West Side. Can''t say why some of these places go to hell and others stay OK even still.'),
(64, 'julian', 't', 'Kenmore, school, boys, rowdy, drink, kid, blood, nastiness, disgusting, hurt, window', 'Kenmore''s got better bowling alleys than schools. I heard we might have a decent hockey team at the Boys'' Club this year. Everyone heads down to the rink in the winter time, but I''m not so much for it. All that rowdiness and drinking. I went once and saw this kid, musta been about 12, bite off his lower lip getting all smashed up against the glass. I could see his teeth just dig into the flesh, and then blood exploded like he just laughed Kool Aid out his nose.'),
(65, 'julian', 't', 'girl, niagara, bus, ride, headphones, fare, kids, aisle, job', 'The teenage girl rides the bus every day. I see her all the time. Her parents are nice folks who live out in Riverside. She gets on and has her headphones up so high everyone else can hear the music. Half the time she puts her pass backwards through the card swipe and don''t even notice it don''t beep. I figure it ain''t worth it to hassle her about it.'),
(66, 'julian', 't', 'night, girl, ride, bus, guy, mister, fuck, heart, fare, life, job', 'One time I was working the night shift and that teenage girl was riding on the bus. She was with this big old hockey player type guy who kept sucking on her neck. She would giggle and tell him to stop, and I could tell there was some kind of something else going on, too.'),
(67, 'julian', 't', 'boy, school, bus, ride, quarter, kenmore, colvin, niagara, elmwood, delaware, home, kids', 'When I was a boy, I rode the bus to school, too. Back then it didn''t cost no dollar fifty though. It was like a quarter. And we''d ride to school, then on the way home we''d transfer and head down to the river. In the warm weather we''d swim and fish, or in the winter we''d burn stuff in the little houses on the coast guard island. We never saw no coast guards.'),
(68, 'julian', 't', 'boy, kids, nastiness, first, hurt, life, harrassing, pretending ', 'One time we were burning this fire in a house and one of my buddies had brought this roman candle with him. He was gonna shoot it out the window from the couch we were sitting on. We had played with roman candles out on the islands a lot. They were weak fireworks, usually, but not this time. The first blast came out of that thing like a canon shot, and this ball of green-blue fire got caught up in the curtain, which pretty much right then just melted to the floor, catching the carpet on fire, then crawling up the walls.'),
(69, 'julian', 't', 'boy, nastiness, bad, bother, school, hurt, nastiness', 'The roman candle was still shooting. Five shots in total. It was a crazy situation. My buddy wanted to drop the candle, but he was afraid it would spin around and shoot him. We ran to the doorway and screamed for him to toss it in the fireplace. We all got out OK, but that house burnt down.'),
(70, 'julian', 't', 'boy, bad, nastiness, shit, idiot, hurt, first, ambulance, window', 'After we burned down the one house, my buddies started thinking it would be fun to just load a house up with as many fireworks as possible and then set it off. So they did that. Then they got gallons and gallons of gasoline and turned another of the cabins into a giant bomb/bonfire. That time, the cabin really blew up some, and a random splinter of wood hit my friend, the one who had brought that first roman candle, in the ear. He went deaf and I don''t know what else. I kind of fell away from those guys after awhile.'),
(71, 'julian', 't', 'Chuckie, retard, fare, bus', 'I remember the first time Chuckie got on my bus. He called me the DustBriver. I have no idea why. I told him to call me Julian. So that''s what he calls me now.'),
(72, 'julian', 't', 'Chuckie, retard, bus, fare, bad, ride, Elmwood, Delaware, Niagara, Goodwill', 'Chuckie don''t ever cause no problems. For the most part. Sometimes if he''s not sure where he''s going he can worry a bunch. And he takes a new route map every day. I ask him, "Chuckie, what are you doing with all them route maps? You must have a million of them at home!" But I guess he loses them pretty much every day, too. I think he takes usually two buses to get to his job at the Goodwill, and who knows what else in between that or where else he goes. I don''t know. All I know is he loves to ride the bus, and it''s OK to have him in the co-pilot. At least I know he don''t want nothing from me.'),
(73, 'julian', 't', 'ride, fare, bad, night, bus, colvin, kenmore, drive, ride', 'The folks who sit in the co-pilot seat are usually pretty needy. Crazy folks, crackheads looking for transfer money, horny ladies after the busdriver. Oh yeah, I get that all the time. Well, I used to get it more, but you never know. I mean, I''m not much of one to flirt with any of them. I know that if they do it to me, they do it to every busdriver they ride with.'),
(74, 'julian', 't', 'bus, fare, ride, Kenmore, Colvin, Delaware, hindsight, heart, fuck, Chuckie, retard, girl, boy', 'One time this other retarded girl got on the bus. She was kind of fat, and I had to drop the bus so she could step up the first step. I don''t mind helping out like that. But even though she was kind of retarded, she wasn''t ugly. You know, her head was kind of funny shaped and she didn''t really look directly at me, but I noticed she looked at Chuckie when she walked by. And he looked like he might have known her. I tried to get him to ask her out but he wouldn''t. He said she wouldn''t go out with him. And I said you never know. "Every dog has his day," I said, "It might happen."'),
(75, 'theresa', 't', 'bus, ride, Kenmore, Colvin, Niagara, Elmwood, Delaware, girl, school', 'I remember the first time I rode the goddamned bus. I had to go across town so I could go to school at Holy Angels because my mama figured nobody ever got a good education at a public school, and she wouldn''t have us in there after grade school. It was fun at first, riding the bus to school, like we were allowed to have some fucking control over our lives. We could go anywhere, and it was our choice to go to school each day.'),
(76, 'theresa', 't', 'boy, girl, fuck, bus, ride, night, bad, life', 'My first boyfriend felt me up for the first time on the bus. No shittin''. We would hike up our skirts extra high when we got out of class, and we''d show off for the boys when we got on the bus.'),
(77, 'theresa', 't', 'home, disgusting, nastiness, shit, piss, kids, nurse, life', 'I hate being a nurse. I got pregnant when I was 17, and I didn''t have much choice about what to do. I made it through nursing school and that has been a decent living. But I hate it. I hate working with sick people. Disgusting nastiness. I''m just so sad all the time after I get home.'),
(78, 'theresa', 't', 'job, life, hindsight, nurse, hospice, ambulance, paramedics', 'Once I was riding the bus, and this old man was on the bus. He started hacking and coughing and I thought he was going to eventually throw up or something, you know, it was real deep down inside him like that. And then I got to the hospital and I''m doing my rounds, and I walk into a room and there he is, the same motherfucker. He rode the bus to the hospital because he thought the ambulance was too expensive.'),
(79, 'theresa', 't', 'crack, first, guy, bus, boy, school, aisle, fare, bad, kids, hurt, attack', 'I got no patience for hobos, bums, crackheads, panhandlers, or generally human annoyances. I saw one time, on the bus, this group of boys roll these two crackheads who kept hasselling them for money. Eventually they pissed off these kids, and they just turned out their pockets. They threw their shitty cigarettes and their crackpipes or whatever out the window, and they might have each taken a couple licks for fun. It was a fucking strange thing to witness. I mean, I wasn''t sure what to do, but there was so many of them boys. I couldn''t get involved. In the end them crackheads didn''t seem much worse for the wear.'),
(80, 'theresa', 't', 'girl, hospice, job, night', 'I used to work with this Latino gal at the hospital looked a lot like that girl there. She wore these big hoop earrings said "Jennie" across them.'),
(81, 'theresa', 't', 'drive, guy, mister, yellow, life, kids, home', 'When I was a kid, my daddy drove a 1964 Chevy Impala that he painted bright yellow. It was the Yellow Jacket, that''s what he called it. He was forever out with the Jacket working on it or cleaning it or just listening to the game on the car radio. That car helped make my daddy a big man in the neighborhood, and we all loved that car. The back seat was so big, I remember, I could lay all the way out and sleep when my sister wasn''t with us.'),
(82, 'theresa', 't', 'hospice, ambulance, paramedics, girl, nurse, life, home, bad, Niagara', 'Janie was sick a lot. She had asthma and had to stay home a lot. Mama stayed home to take care of her, or sometimes my aunt would come in from Niagara Falls. She would always make us take her down to the Italian restaurant on the corner which used to be owned by mobsters, I think.'),
(83, 'theresa', 't', 'yellow, pretending', 'I remember riding out to the hospital on the bus after school to visit Janie, and I''d see the Yellow Jacket in the parking lot. It would be sitting there like a beacon, shining in the middle of the parking lot. Mama saw the Yellow Jacket from the bus once, sittin in the hospital parking lot, when Janie weren''t sick at all. '),
(84, 'theresa', 't', 'kids, bad, god, pretending, yellow, home', 'That day Mama caught him with the nurse from the Pediatrics wing, he came home late that night. We didn''t see him until the next day after school. And in the morning, when we leave for school, we notice the Yellow Jacket is gone. Never saw that fucking car ever again.'),
(85, 'theresa', 't', 'girl, teeth, school, bus, fare, ride, night, mornings', 'I cracked my teeth once on the curb one winter. I was running to catch the bus and I slipped on some fucking ice that I didn''t see. It had gotten real warm that week, and everywhere there were big puddles where the snow used to be. Then over night it froze and the next morning there were spots where the ice was thin as paper and slick as snot.'),
(86, 'theresa', 't', 'nurse, job, night, school, kids, brain', 'I didn''t do well in my nursing classes. I was usually tired from working the night shift at American Brass. Now that was a shitty job. At least nursing is better than that crap. Oh, it would drive me crazy, pulling the same lever, making a million little things that don''t look like nothing. You know, like fucking eyelets for your sneakers and whatnot.'),
(87, 'theresa', 't', 'blood, kids, nurse, job, life', 'I hate two things more than anything else in the world: blood and crap. I''ve had three kids and been a nurse for almost 30 years. I''ve seen too much blood and crap.'),
(88, 'theresa', 't', 'home, kids, scream, signs', 'One day we came home and Daddy was gone, too. He left us a note and Mama said it was for the best. He just up and left. There weren''t no reason for it. It was just out of the blue.'),
(89, 'conchita', 't', 'headphones, home, bus, ride, school, Kenmore, Colvin, Elmwood, Delaware, Niagara, Goodwill', 'I got my first pair of headphones when I was 12. My Papi said that he thought I deserved to have my own headphones if I was going to ride the bus to school next year. I had to go across town because if I was going to get into City Honors I had to go to the best school in the city to prepare. And if that meant riding the bus for an hour each way, then that was OK with my Papi.'),
(90, 'conchita', 't', 'life, Elmwood, signs, heart', 'Once when Papi and I were waiting for the bus after he took me shopping on Elmwood for a new purse for my birthday, we were sitting on bench. I remember Papi looked so old at that moment, and for a second I thought he might be having a heart attack or some gas or something because his face screwed up all weird.'),
(91, 'conchita', 't', 'life, home, heart', 'Papi looked at me and asked me if I missed my mother. I said I did sometimes. He said, "Well, you know that you are as old now as she was when we found out you were coming."  I knew that. I never met her, I mean, not that I remember, but Papi and Mami have told me about her. About how she looks like me. About how she thought she knew everything and if she wanted to she could have been a great woman like Madame Curie or Eva Peron.'),
(92, 'conchita', 't', 'signs, god, life', '"Conchita" He looked at me and made it feel like this was a real serious moment, and he said, "You know better, right? You will not go to fast. You are a smart girl."'),
(93, 'conchita', 't', 'headphones, girl, life, mornings, night', 'I think some of the most meaningful moments in my life have been accompanied by music. It''s like as if I''m just in tune to the rhythm or something. Like if I''m angry and I listen to an angry song, then I, like, work it out through that, you know? Or if I''m trying to, you know, chill out and just be kind of zen then I have to get some kind of mellow music going on. I think I''m just like seriously in-tune with the musical wavelength.'),
(94, 'conchita', 't', 'life, bad, guy, girl, boy, bother, first, nurse', 'It was so sad. Jimmy didn''t even get a cast because of how small his fracture was, but it totally hurt way more than that. I like helped out with the pain by giving him a back and shoulder rub while I played him some Enya in the background from the LotR soundtrack. I think it was, like, totally soothing.'),
(95, 'conchita', 't', 'bad, guy, girl, boy, hurt, school', 'I got Jimmy a card after he found out he''d have to sit out on the game. I made it in the computer and it had a picture of a kitten, all bandaged up and with a little crutch propped up next to him and a football laying at his feet, on the front and on the inside it said, "Can''t wait to have you back on the field, Tiger!" We passed it around the school, and I signed it first, but by the time it got to Jimmy my signature was, like, totally unreadable and some slut wrote her phone number in it. Jimmy said it was OK and he knew it was from me. He''s super sweet.'),
(96, 'conchita', 't', 'quiet, god, life, heart, bus, Niagara', 'Papi told me my mother had gone away to take a job. That''s what he said at first. That she was so sorry she had to leave, but she would eventually maybe come back. I kept hoping for that. And I guess I still would be, except we heard like a couple years after that how she had been found in a squatter house in Niagara Falls. And it wasn''t really so sad that she was dead, I mean, she wasn''t ever around. But, like, what really weirds me out was thinking how I could have just taken the bus out to meet her anytime. I mean, if I had been old enough to take the bus back then.'),
(97, 'conchita', 't', 'Elmwood, home, teeth, guy, harrassing, Goodwill', 'Once we were eating at the Manhatten Bagel on Elmwood and this homeless guy was, like, trying to perform for money outside the window where we were eating. He had this Freddy Krueger mask and was like sneaking up on people walking by. It was a beautiful day, so lots of people were out. He''d walk too close to them or hold their hand and they''d freak out. We kept thinking somebody would punch his lights out. He tried to beg some money off us, but we didn''t have any. We never saw him again. It was, like, so totally random.');

-- --------------------------------------------------------

--
-- Table structure for table `tirwArticles`
--

DROP TABLE IF EXISTS `tirwArticles`;
CREATE TABLE IF NOT EXISTS `tirwArticles` (
`tirwArticleId` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `year` varchar(64) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tirwArticles`
--

INSERT INTO `tirwArticles` (`tirwArticleId`, `title`, `subtitle`, `url`, `year`) VALUES
(1, 'Ferris Wheel', NULL, 'http://www.uiowa.edu', '1999'),
(2, 'Self-Portrait as Child with Father', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/hypermedia/edward_falco/webpages/selfportrait.html', '1999'),
(3, 'Frame Work', '', 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/hypermedia/robert_kendall/index.html', '1999'),
(4, 'Endless Suburbs', NULL, 'not found', '1999'),
(5, 'A Fable of Words', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/nonhyper/jeffrey_bockman.htm', '1999'),
(6, 'Mitosis', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/hypermedia/kevin_fanning/mitosis/mitosis', '1999'),
(7, 'The dear mr thomas letters', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/hypermedia/kevin_fanning/mrthomas/inde', '1999'),
(8, 'Broken', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/hypermedia/sondheim_smylie/broken1.swf', '2000'),
(9, 'Reality Dreams, Scroll One', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/hypermedia/joel_weishaus/real-1.htm', '2000'),
(10, 'Simple harmonic Mostion Or, Josephine Baker in the Time Capsule', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/hypermedia/diane_greco/begin.html', '2000'),
(11, 'Pronunciation:''fut, or:A Tool and it''s Means', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/hypermedia/diane_greco/begin.html', '2000'),
(12, 'Divine Mind Fragment Theater', NULL, '', '2000'),
(13, 'City of Bits', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/hypermedia/thomas_swiss/pages/index.html', '2000'),
(14, 'The 12hr-ISBN-JPEG Project', NULL, 'ftp://ftp.rdrop.com/pub/users/bbrace/12hr.jpeg', '2000'),
(15, 'The Birth of Detachment', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/hypermedia/jennifer_ley/welcome.html', '2000'),
(16, 'Lexia to Perplexia', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/hypermedia/talan_memmott/index.html', '2000'),
(17, 'The Universal Resource Locator', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/hypermedia/md_coverley2/index.html', '2000'),
(18, 'Book of Job', NULL, 'http://www.warnell.com/syntac/boj.htm', '2000'),
(19, 'A Long Wild Smile', NULL, 'http://www.hypertxt.com/parker/magnetic/', '2001'),
(20, 'The Impermanence Agent', NULL, 'http://www.impermanenceagent.com/agent/', '2001'),
(21, '-][selec]: co][deP][l][oetry]', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/hypermedia/mez/selectext/index.htm', '2001'),
(22, 'data][h!}[bleeding texts', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/hypermedia/mez/datahtexts/index.gif', '2001'),
(23, 'Simple harmonic Mostion Or,  Josephine Baker in the Time Capsule', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/hypermedia/diane_greco/begin.html', '2000'),
(24, 'Winter Break', NULL, 'http://www.adrienneeisen.com/winterbreak/', '2001'),
(25, 'Everything after That', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/hypermedia/martha_conway/everything.html', '2001'),
(26, 'Training Missions', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/hypermedia/amato/tm.html', '2001'),
(27, 'Reach', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/archives/michael_joyce/ReachTitle.html', ''),
(28, 'Poetrica', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/giselle/giselle.html', '2001'),
(29, 'Selected New Poems', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/uribe/uribe.html', '2002'),
(30, 'ORIENT', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/younghae/young_hae_chang_heavy_industries.html', '2002'),
(31, 'Dervish Flowers', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/flyingpuppets/puppets.htm', '2002'),
(32, 'New Digital Emblems', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/poundstone/poundstone.htm', '2002'),
(33, '"Of Dolls and Monsters" An interview with Shelley Jackson', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/jackson/jackson.htm', '2002'),
(34, 'Electronic Literature', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/hayles/hayles.htm', '2002'),
(35, 'Exceprts from Mark Amerika''s Oz Blog', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/amerika/amerika.htm', '2002'),
(36, 'Inflat-o-space', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/irish/irish.htm', '2002'),
(37, 'New Media Writing', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/sept/index.html', '2002'),
(38, 'Remembering My Life In/Of Words', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/kostelanetz/index.html', '2002'),
(39, 'An Interview, an Essay, a New Media Project', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/strickland/index.html', '2002'),
(40, 'Our day with Jerry Springer', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/schneiderman/index.html', '2002'),
(41, 'A loss is less and death is not so easy', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/rantala/index.html', '2002'),
(42, 'Experiemental Literature was really the first kick: An interview with Scanner', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/scanner/index.html', '2002'),
(43, 'Crowds and Power', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/zellen/index.html', '2002'),
(44, '"Red, Black, White, and Gray." An Interview with Motomichi Nakamura', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/motomichi/index.html', '2002'),
(45, 'Judd Morrissey & Lori Talley: An Interview & Essay', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/morrissey_talley/index.html', '2003'),
(46, 'New York', NULL, NULL, NULL),
(47, 'New work & an interview', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/tabbi/index.html', '2003'),
(48, 'Self Portrait(s) [as Other(s)] & an interview', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/memmott/index.html', '2003'),
(49, '3 Proposals for Bottle Imps & an Interview', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/poundstone03/index.html', '2003'),
(50, 'An Interview with John Cayley', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/cayley/index.html', '2003'),
(51, 'New Work & Reviews', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/june03/index.html', '2003'),
(52, 'An Interview with Margaret Stratton', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/stratton/index.html', '2003'),
(53, 'Pax & An Interview', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/moulthrop/index.html', '2003'),
(54, 'Hacktivism? I didn''t know the term existed before I did itâ€¦ An Interview with Brian Kim Stefans', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/stefans/index.html', '2003'),
(55, 'Digital Nature: the Case Collection version 2.0, & An Interview', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/halpern/index.html', '2003'),
(56, 'Afterwards', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/malloy/index.html', '2003'),
(57, '"If one succeeds in seceding, where has one managed to go?" an Interview with Amy Sara Carroll', NULL, '"If one succeeds in seceding, where has one managed to go?" an Interview with Amy Sara Carroll', '2003'),
(58, 'An interview and a review', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/bolter/index.html', '2004'),
(59, 'An interview & new work', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/cave/index.html', '2004'),
(60, 'The Iowa Review Web Special Remembering Donald Justice', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/justice/index.html', '2004'),
(61, 'Two Reviews', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/nickm/index.html', '2004'),
(62, 'New Work', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/sept04/index.html', '2004'),
(63, 'An interview with Diana Slattery', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/grigar/index.html', '2004'),
(122, 'Bcc', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/tirweb/feature/motomichi/bcc/bcc.html', '2002'),
(90, 'News from Erewhon', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/oct05/niss_deed.html', '2005'),
(89, 'ASK ME FOR THE MOON', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/aug05/images/zorn.gif', '2005'),
(83, 'CATHERINE GUDIS, BUYWAYS: BILLBOARDS, AUTOMOBILES, AND THE AMERICAN LANDSCAPE', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/aug05/images/chasar.jpg', '2005'),
(87, 'CONSCIOUSNESS, LITERATURE, AND SCIENCE FICTION', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/aug05/goonan.html', '2005'),
(91, 'The Bomar Gene', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/oct05/nelson.html', '2005'),
(92, 'Pieces of herself', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/oct05/davis.html', '2005'),
(93, '10:01', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/oct05/olsen_guthrie.html', '2005'),
(94, 'FaÃ§ade', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/july06/facade.html', '2006'),
(95, 'Book and Volume', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/july06/bookandvolume.html', '2006'),
(96, 'Avant-Gaming: An Interview with Jane McGonigal', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/july06/mcgonigal.html', '2006'),
(97, 'Behind FaÃ§ade: An Interview with Andrew Stern and Michael Mateas', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/july06/stern_mateas.html', '2006'),
(98, 'Written on the Body: An Interview with Shelley Jackson', NULL, NULL, '2005'),
(99, 'Workplace is Mediaspace is Cityscape: Nick Montfort on Book and Volume', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/july06/montfort.html', '2006'),
(100, 'Editor''s Introduction: Reconfiguring Place and Space in New Media Writing', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/july06/intro.html', '2006'),
(101, 'Honi | Tacotsubo', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/feb06/tomomi.html', '2006'),
(102, 'Harvester', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/feb06/osborn.html', '2006'),
(103, 'A Brief Lecture on Author/ity', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/feb06/bhagat.html', '2006'),
(104, 'Firebirds, Firebirds-Berlin, Tongues of Fire', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/feb06/demarinis.html', '2006'),
(105, 'Speaking Volumes', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/feb06/labelle.html', '2006'),
(106, 'Sound Art, Art, Music', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/feb06/kahn2.html', '2006'),
(107, 'Editor''s Introduction', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/feb06/intro.html', '2006'),
(108, 'An Interview with John Cayley on Torus', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/september06/cayley/cayley.html', '2006'),
(109, 'Word Museum', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/september06/gillespie/wordmuseum.html', '2006'),
(110, 'The Nihilanth: Immersivity in a First-Person Gaming Mod', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/september06/baldwin/nihilanth.html', '2006'),
(111, 'Torus (Video)', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/september06/cayley/torus.html', '2006'),
(112, 'Interview with Aya Karpinska on "mar puro"', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/september06/karpinska/karpinska_interview.html', '2006'),
(113, 'An Interview with David Knoebel on "Heart Pole"', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/september06/knoebel/knoebel.html', '2006'),
(114, 'Heart Pole', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/september06/knoebel/heartpole/heartpole.html', '2006'),
(115, 'mar puro', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/september06/karpinska/marpuro.html', '2006'),
(116, 'TLT vs. LL', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/september06/warnell/warnell.html', '2006'),
(117, 'An Interview with Dan Waber on "five by five "', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/september06/waber/waber_interview.html', '2006'),
(118, 'five by five', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/september06/waber/fivebyfive.html', '2006'),
(119, 'Editor''s Introduction: Writing. 3D', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/september06/raley/editorsintro.html', '2006'),
(121, 'New Word Order', NULL, 'http://iowareview.uiowa.edu/TIRW/TIRW_Archive/mainpages/new/september06/baldwin/nwo.html', '2006'),
(123, 'Under Language', NULL, 'http://iowareview.uiowa.edu/TIRW/vol9n2/artworks/underLanguage/index.htm', '2008'),
(124, 'Concerto for Narrative Data', NULL, NULL, NULL),
(125, 'activeReader', NULL, 'http://iowareview.uiowa.edu/TIRW/vol9n2/artworks/activeReader/oscheck.html', NULL),
(126, 'So Random', NULL, 'http://iowareview.uiowa.edu/TIRW/vol9n2/artworks/soRandom/', NULL),
(127, 'PiTP', NULL, 'http://shawnrider.com/pitp/', NULL),
(128, 'riverIslant QT', NULL, 'http://iowareview.uiowa.edu/TIRW/vol9n2/artworks/riverisland/riverislandQT.html', NULL),
(129, 'The Purpling', NULL, 'http://iowareview.uiowa.edu/TIRW/vol9n2/artworks/The_Purpling/index.html', NULL),
(130, 'TIR-W Volume 9 no. 1 Multi-Modal Coding: Jason Nelson, Donna Leishman, and Electronic Writing', NULL, 'http://iowareview.uiowa.edu/TIRW/vol9n1/', NULL),
(131, 'Deviant', NULL, 'http://www.6amhoover.com/xxx/start.htm', NULL),
(132, 'Leishman Site', NULL, 'http://www.6amhoover.com/index_flash.html', NULL),
(133, 'Pandemic Rooms', NULL, 'http://www.secrettechnology.com/pandemic/', NULL),
(134, 'Nelson Index', NULL, 'http://www.secrettechnology.com/works/everything.htm', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tirwContributors`
--

DROP TABLE IF EXISTS `tirwContributors`;
CREATE TABLE IF NOT EXISTS `tirwContributors` (
`tirwContributorId` int(11) NOT NULL,
  `firstname` varchar(128) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `biography` text,
  `isLive` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tirwContributors`
--

INSERT INTO `tirwContributors` (`tirwContributorId`, `firstname`, `lastname`, `biography`, `isLive`) VALUES
(1, 'Charisse', 'Madlock-Brown', 'This is my bio', 1),
(2, 'Craig', 'Dietrich', 'http://craigdietrich.com', 1),
(3, 'Deena', 'Larson', NULL, 1),
(6, 'Edward', 'Falco', NULL, 1),
(7, 'Robert', 'Kendall', NULL, 1),
(9, 'M.D.', 'Coverley', 'M.D. Coverley (Marjorie Coverley Luesebrink) writes electronic hypermedia fiction and non-fiction. Her full-length novel, Califia, is available on CD-ROM from Eastgate Systems. She is currently President of the Board of Directors of the Electronic Literature Organization.', 1),
(10, 'Jeffery M.', 'Bochman', NULL, 1),
(11, 'Kevin', 'Fanning', NULL, 1),
(12, 'Alan', 'Sondheim', NULL, 1),
(13, 'Barry', 'Smylie', NULL, 1),
(14, 'Joel', 'Weishaus', NULL, 1),
(15, 'Diana', 'Greco', 'Diane Greco is a writer and editor. She works at Eastgate Systems, the world''s premier publisher of electronic literature, in Watertown, MA', 1),
(16, 'Talan', 'Memmott', 'Talan Memmott is a hypermedia artist/writer from San Francisco, California. He is the Creative Director and Editor of the online hypermedia literary journal BeeHive. His website is http://memmott.org/talan/', 1),
(17, 'Jennifer', 'Ley', NULL, 1),
(18, 'Brad', 'Brace', NULL, 1),
(19, 'Thomas', 'Swiss', NULL, 1),
(20, 'Skye', 'Giordano', NULL, 1),
(21, 'Jim', 'Andrews', NULL, 1),
(22, 'c. allan', 'dinsmore', NULL, 1),
(23, 'Ted', 'Warnell', NULL, 1),
(24, 'Jeff', 'Parker', NULL, 1),
(25, 'Noah', 'Wardrip-Fruin', 'Noah Wardrip-Fruin writes for and about new media. He has recently edited two books -- The New Media Reader (with Nick Montfort, 2003) and First Person: New Media as Story, Performance, and Game (with Pat Harrigan, 2004), both from MIT Press. His new media writing has been presented by the Whitney and Guggenheim museums.', 1),
(26, 'a.c.', 'chapman', 'http://www.adamchapmanart.com/cv.html', 1),
(27, 'Brion', 'Moss', 'http://www.queeg.com/~brion/', 1),
(28, 'Duane', 'Whitehurst', NULL, 1),
(29, '', 'mez', 'http://www.hotkey.net.au/~netwurker/', 1),
(30, 'Adrienne', ' Eisen', 'http://www.adrienneeisen.com/', 1),
(31, 'Martha', 'Conway', 'http://marthaconway.com/bio.html', 1),
(32, 'Joe', 'Amato', 'http://www.ilstu.edu/~jamato2/', 1),
(33, 'Michael', 'Joyce', 'http://faculty.vassar.edu/mijoyce/', 1),
(34, 'Giselle', ' Beiguelman', 'Giselle Beiguelman is a multimedia essayist and web-artist who lives in SÃ£o Paulo, Brazil, where she was born. She teaches Digital Culture and Literature in the Communication and Semiotics Program at the university there. Since 1998, she has run desvirtual.com, an editorial studio.', 1),
(35, 'Ana Maria', 'Uribe', 'ANA MARIA URIBE  was born in Buenos Aires, Argentina, where she lives. Since the late 1960s she has been working on visual poetry. Her first pieces were Typoems or typographic poetry--many years later, this work served as the basis for the series of witty and often entertaining Web animations featured here.', 1),
(36, '', 'YOUNG-HAE CHANG HEAVY INDUSTRIES', 'YOUNG HAE CHANG HEAVY INDUSTRIES (http://www.yhchang.com) was founded in Seoul by Young-hae Chang, and Marc Voge.', 1),
(37, 'Nicolas', ' Clauss', 'Nicolas Clauss was born in Paris in 1968 and lives there still. He is a painter who stopped "traditional" painting to use multimedia and the internet as a canvas. His recent work is displayed on the site flyingpuppet.com. He works as a freelance multimedia artist on commissioned projects.', 1),
(38, 'Jean-Jacques', ' Birge', 'Jean-Jacques BirgÃ© is a sound designer and a music composer. He is also a film director; his film, "The Sniper, Sarajevo a Street under Siege" received a British Academy Award.', 1),
(39, 'William', ' Poundstone', 'William Poundstone is the author of eight books--two of them, The Recursive Universe and Labyrinths of Reason, were nominated for the Pulitzer Prize. His new book, The Redmond Interview,will be published by Little, Brown in 2003. Poundstone''s digital photographs will be shown at Circle Elephant Art in Los Angeles this October.', 1),
(40, 'Brain Kim', ' Stefans', 'Brian Kim Stefans is the author of three books of poetry, including Free Space Comix (Roof, 1998). His most recent book is Fashionable Noise: On Digital Poetics, a collection of poetic essays. A new essay will appear in New Media Poetics: Histories, Institutions, and Audiences, published by MIT Press in 2004. He edits the website  Arras, devoted to new media poetry.', 1),
(41, 'Rita', 'Raley', 'Rita Raley is Assistant Professor of English at the University of California, Santa Barbara, where she teaches courses in the digital humanities and global literary studies. She is completing work on one book, Global English and the Academy, and also currently at work on a book about digital textuality. Her most recent articles address hypertext and performance and the electronic empire.', 1),
(42, 'Ravi', 'Shankar', 'Ravi Shankar is a writer and editor who has published work in such places as Poets & Writers, Time Out New York, Paris Review, and Massachusetts Review. He teaches at the University of New Haven. He is the founding editor of the online journal of the arts, Drunken Boat, and has participated in panels for the Electronic Literature Organization and Poet''s House. You can read an interview with him at Jacket.', 1),
(43, 'N. Kathrine', ' Hayles', 'N. Katherine Hayles, Professor of English and Media Arts at the University of California, writes and teaches on the relations between science, literature, and technology. Her most recent book, How We Became Posthuman: Virtual Bodies in Cybernetics, Literature and Informatics, won the Rene Wellek Prize for the best book in literary theory for 1998-99. She is currently at work on two books on electronic textuality, Literature for Posthumans and Coding the Signifier: Rethinking Semiosis from the Telegraph to the Computer.', 1),
(44, 'Lisa', 'Gitelman', 'Lisa Gitelman is a professor of Media Studies at Catholic University and the author of Scripts, Grooves, and Writing Machines (Stanford 1999). She is currently working on a book about the ways that media are experienced and studied as historical subjects.', 1),
(45, 'Mark', ' Amerika', 'Mark Amerika is a professor of digital art at the University of Colorado. His work has been exhibited internationally at many well-known venues, including the Walker Arts Center, the Guggenheim, and the Whitney Biennial. His FILMTEXT is the third part of a major new media trilogy. It was commissioned by Playstation 2 as part of his net art retrospective at the Institute for Contemporary Arts in London.', 1),
(46, 'Jessica', ' Irish', 'Jessica Irish is an inter-media artist, working in multimedia, print and online spaces. Her current work is an investigation into the relationships between information technology, architecture and what is still called ''the landscape''. Irish is the founding Co-Director for OnRamp Arts, a digital arts studio for collaborative projects between communities and artists in Los Angeles.', 1),
(47, 'Marc C.', 'Marino', 'Mark C. Marino is the editor of Bunk Magazine . He began his hypertext work at Brown University, and continued at the University of Notre Dame (MFA) and Loyola Marymount University (MA), where he taught courses in new media. He is currently pursuing a Ph.D. in electronic literature at the University of California at Riverside.', 1),
(48, 'William', 'Gillespie', 'William Gillespie lives in Urbana, hosts the radio show "Eclectic Seizure," and runs Spineless Books.', 1),
(49, 'Dirk', 'Stratton', 'Dirk Stratton teaches creative writing at the School for the Performing and Creative Arts.', 1),
(50, 'Richard', 'Kostelanetz', 'Richard Kostelanetz is a writer, artist, critic, and editor who is productive in many fields. Among his works are Recyclings: A Literary Autobiography (1974, 1984), Politics in the African-American Novel (1991), Published Encomia, 1967-91 (1991), and On Innovative Art(ist)s (1992). His films include A Berlin Lost (1984) and Berlin Sche-Einena Jother (1988), both with Martin Koerber.', 1),
(51, 'Stephanie', 'Strickland', 'Stephanie Strickland''s poem V is the first work of poetry to exist simultaneously in print and on the Web as one work. V: WaveSon.nets/Losing L''una (Penguin 2002) was selected by Brenda Hillman for the Alice Fay Di Castagnola Prize of the Poetry Society of America.\n\nStrickland''s print volumes include True North and The Red Virgin. Her hypermedia work includes The Ballad of Sand and Harry Soot. As the McEver Chair in Writing at the Georgia Institute of Technology, Strickland produced TechnoPoetry Festival 2002. Her website is stephaniestrickland.com.', 1),
(52, ' Jaishree', 'Odin', 'Jaishree K. Odin teaches at the University of Hawaii at Manoa. Her book To the Other Shore: Lalla''s Life and Poetry (Vitasta Pub 1999) is a feminist exploration of the life and thought of the fourteenth-century poet Lalla. She has also written on electronic literature. Her current book-length project, Through the Looking Glass: Technology, Nomadology, and Postmodern\nNarrative, is a theoretical study of shattered visual metaphors in contemporary literature and art.', 1),
(53, 'Davis', 'Schneidermann', 'Davis Schneiderman is Chair of the American Studies Program and an Assistant Professor of English at Lake Forest College. His creative work has been nominated for a Pushcart Prize and has been accepted by Exquisite Corpse, Quarter After Eight, The Little Magazine, Neotrope, Happy, Gargoyle, EnterText, 3AM, and The CafÃ© Irreal, and Mammoth Press''s forthcoming anthology Sudden Stories, among others. He is currently co-editing the collection, Millions of People Reading the Same Words: William S. Burroughs and the Global Order (Pluto Press).', 1),
(54, 'Kathryn', 'Rantala', 'Katheryn Rantala has work appearing in Notre Dame Review, South Dakota Review, Best of Melic Review, Crowd and others print journals as well as in a number of online publications. A collection of poetry and prose, Missing Pieces, was published by Ocean View Press.', 1),
(55, 'Rebekah', ' Farrugia', 'Rebekah Farrugia is a Ph.D. student in the department of Communication Studies at the University of Iowa. Her research interests focus generally around the intersections between women, popular music, and technology.', 1),
(56, '', 'Scanner', 'Scanner''s diverse body of work includes soundtracks for films, performances, radio, and site-specific intermedia installations. He has performed in and created works for many art spaces, including San Francisco MOMA (USA), Hayward Gallery (London), Pompidou Centre (Paris), Tate Modern (London) and the Modern Museum (Stockholm). His CD''s are available for purchase at http://www.posteverything.com/bette', 1),
(57, 'Jody', 'Zellen', 'Jody Zellen is an artist living in Los Angeles, California. She has had numerous exhibitions including a recent solo show at The Sesnon Gallery, University of Calfornia, Santa Cruz. She has been included in group exhibitions at the SF Museum of Modern Art, The Los Angeles County Museum of Art, The California Museum of Photography, and elsewhere. Her website, Ghost City (www.ghostcity.com), began in 1997 as a meditation on the city. She is currently working on a new project called Disembodied Voices.', 1),
(58, 'Thom', 'Swiss', 'Thomas Swiss, Professor of English and Rhetoric of Inquiry at the University of Iowa, writes and teaches on poetry, technology, and popular music. His collaborative New Media poems appear online in a variety of literary venues, as well as in art exhibits. He is the author of two collections of poems, Rough Cut and Measure, and editor of two recent books about the Web. His web site: http://bailiwick.lib.uiowa.edu/swiss/', 1),
(59, 'Motomichi', 'Nakamura', 'Motomichi Nakamura is a visual artist living in NYC. He graduated from Parsons School of Design and he specializes in creating animations and visuals for online/offline use. His animations have been showcased at The Sundance Online Film Festival 2001 and 2002; and the Beaubourg Contemporary Art Center. His award-winning work has been published in many art magazines in both the U.S. and in Europe.', 1),
(60, 'Jessica', 'Pressman', 'Jessica Pressman is Associate Director of the Electronic Literature Organziation and a doctoral student at UCLA''s English Department, where she is writing a dissertation on electronic literature.', 1),
(61, 'Joseph', 'Tabbi', 'Joseph Tabbi is founder and editor of the electronic book review (www.altx.com/ebr). His most recent book, Cognitive Fictions, offers a comprehensive look at contemporary American writing in light of systems theory and cognitive science.', 1),
(62, 'Anthony', 'Enns', 'Anthony Enns is a Ph.D. Candidate in the Department of English at the University of Iowa.', 1),
(63, 'John', 'Cayley', 'John Cayley won the ELO''s first annual award in digital poetry in 2001 (http://www.eliterature.org/Awards2001/index.shtml). Most recently, he published a lengthy commentary in the Electronic Book Review called "The Code is not the Text (Unless it is the Text)". His website is shadoof.net.', 1),
(64, 'Heidi', 'Bean', 'Heidi Bean is a Ph.D. candidate in the Department of English at the University of Iowa.', 1),
(65, '', 'geniwate', 'geniwate is an electronic text artist from Melbourne, Australia. Her work has appeared in many electronic journals and she is a winner of the trAce-/alt-X International Hypertext Competition and a finalist in the Electronic Literature Organization''s electronic poetry award.', 1),
(66, 'Pamela', 'Gay', 'Pamela Gay specializes in short fiction, creative nonfiction, and installation art. She teaches "Enlarging Micro-Fiction: Text & Image" at Binghamton University, State University of New York where creative writing and graphics arts students collaborate on an e-anthology incorporating text & image.', 1),
(67, 'Seth', 'Thompson', 'Seth Thompson is a media artist and educator whose work has been exhibited internationally. He has worked as a Contractual Artist/Lecturer with the Metropolitan Museum of Art and as Education Director at Harvestworks Digital Media Arts, and he is currently the director/producer of Wigged Productions and a part-time faculty member at the University of Akron.', 1),
(68, 'Margaret', 'Stratton', 'Margaret Stratton''s work in photography and video ranges from formal black-and-white landscapes to autobiographical first-person narratives. Her work often focuses on a critique of film and television, and on the stereotyping of women and people of color in entertainment. Her website is www.margaretstratton.com.', 1),
(69, 'Leslie', 'Roberts', 'Leslie Roberts is a Fulbright Fellow at Gateway Antarctica, a Centre for\nAntarctic Studies and Research at the University of Canterbury in New Zealand. She is working on a book and documentary, both titled "Amundsen''s Knife." She has an MFA from the University of Iowa''s Nonfiction Writing Program', 1),
(70, 'Stuart', 'Moulthrop', 'Stuart Moulthrop is Professor of Information Arts and Technologies at the University of Baltimore and director of the school''s new undergraduate program in Simulation and Digital Entertainment (iat.ubalt.edu/sde). His previous electronic works include Victory Garden (1991), "Hegirascope" (1995), and "Reagan Library" (1999). He is an emeritus editor of the journal Postmodern Culture and was a founding director of the Electronic Literature Organization.', 1),
(71, 'Tal', 'Halpern', 'Tal Halpern''s  previous electronic work includes Archiving Nature: Preservation Practices for a Digital Age (2001: Zentrum fur Kunst und Medientechnologie Karlsruhe (ZKM)) and Chromosome 22: Mapping the Human Genome (2000). He lives in New York City and is an educational media specialist at New York University.', 1),
(72, 'Patrick F.', 'Walter', 'Patrick F. Walter received his BA in Engish from The University of Iowa.', 1),
(73, 'Judy', 'Malloy', 'http://www.well.com/user/jmalloy/mybio.html', 1),
(74, 'Amy Sara', ' Carroll', 'Amy Sara Carroll Amy Sara Carroll is a doctoral candidate in Duke University''s Program in Literature. Currently she is completing her dissertation on contemporary Mexican and U.S. postmodern cultural production, including performance, installation, video and net-art. Carroll has published poetry and poem-prints in various journals, and her poem-print "Interracial" recently appeared in This Bridge We Call Home (Routledge, 2002). She has exhibited poem-prints at the Audre Lorde Project (Brooklyn, New York), Duke University Museum of Art, Schweinfurth Memorial Art Center (Auburn, New York), and State-of-the-Art Gallery (Ithaca, New York).', 1),
(75, 'David', 'Silver', 'David Silver is an assistant professor in the Department of Communication and the founder of the Resource Center for Cyberculture Studies at the University of Washington.', 1),
(76, 'Kelly', 'McLaughlin', 'Kelly McLaughlin is both a PhD candidate in American Studies and an MFA candidate in Intermedia and Video Art at the University of Iowa. She is co-curator of an exhibit on new media art and language to be held at the University of Iowa''s Museum of Art in 2006. Her website is http://kellymclaughlin.org', 1),
(77, 'Diana', 'Gromala', 'Diane Gromala teaches in the graduate program in Information Design and Technology at the Georgia Institute of Technology where she is an Associate Professor in the School of Literature, Communication, and Culture. She is also on faculty in the Graphics Visualization and Usability Center as well as an adjunct faculty member in Industrial Design. Her scholarly work is informed by her practice as both artist and designer. Her website is http://www.lcc.gatech.edu/~gromala/.', 1),
(78, 'Jay David', 'Bolter', 'Jay David Bolter is Wesley Professor of New Media and Director of the Center for New Media Research and Education in the Department of Literature, Communication and Culture at the Georgia Institute of Technology. He co-created Storyspace, a hypertextual computer program, with Michael Joyce and John B. Smith. Bolter is the author of several influential works on the subject of computers, culture, and media literacy including Remediation: Understanding New Media (1999), co-authored with Richard Grusin, and most recently, Windows and Mirrors: Interaction Design, Digital Art, and the Myth of Transparency (2003), co-authored with Diane Gromala. His website is http://www.lcc.gatech.edu/~bolter/.', 1),
(79, 'Robert', 'Cover', 'Robert Coover has been teaching creative digital media workshops since 1990, when the first pioneer hyperfiction workshop was launched. His newest digital project is the Cave Writing Workshop and his newest book is Stepmother, to be published by McSweeney''s in May 2004.', 1),
(80, 'Jill', 'Walker', 'Jill Walker is a new media teacher and researcher at the University of Bergen, Norway. In addition to being an avid weblogger and researcher of networked communications, she''s a critic specializing in electronic literature and art.', 1),
(81, 'Josh', 'Carroll', 'Josh Carroll is the founder and president of Jeyo, Inc., a software\nfirm that specializes in development for mobile devices. He is currently pursuing degrees in English and political science at Brown University.', 1),
(82, 'Scott', 'Retburg', 'Scott Rettberg teaches New Media Studies at Richard Stockton College of New Jersey. He is the co-founder of the Electronic Literature Organization and the coauthor of the Unknown, a hypertext novel, and Implementation, a sticker novel.', 1),
(83, 'Michelle', 'Higa', 'Michelle Higa is an artist and technologist who creates interactive video installations. She is currently serving as an Editor-in-Chief for CHAISE, a DVD magazine featuring emerging artists. She graduated from Brown University with honors in Art: Semiotics.', 1),
(84, 'Steven', 'Cramer', 'Steven Cramer is the author of four poetry collections, and his poems and criticism have appeared in numerous literary journals. Recipient of fellowships from the Massachusetts Artists Foundation and the National Endowment for the Arts, he directs the low-residency MFA program in creative writing at LesleyUniversityinCambridge.', 1),
(85, 'Donald', 'Justice', 'Donald Justice was the author of eight books of poetry, the first five of which are represented in his New and Selected Poems, published in 1995 by Alfred A. Knopf, Inc. He was born in Miami, Florida, in 1925 and earned degrees from the University of Miami (B.A. 1945), where he studied musical composition with Carl Ruggles, the University of North Carolina (M.A. 1947), and the University of Iowa (Ph.D. 1954). He also conducted postgraduate study at Stanford University from 1948-49. Before retiring in 1992, he held teaching positions at The University of Florida, The University of Miami, The University of Iowa, and Syracuse University among other institutions.', 1),
(86, 'Tevis', 'Thompson', 'Tevis Thompson is a writer and graduate student at the University of Iowa.', 1),
(87, 'Nick', 'Monfort', 'Nick Montfort is a PhD student in computer and information sciences at the University of Pennsylvania.', 1),
(88, 'Mike', 'Chasar', 'Mike Chasar''s essays and reviews have appeared most recently in  Rain Taxi Review of Books and Word for/Word', 1),
(89, 'Michael', 'Davidson', 'Michael Davidson is Professor of American Literature at UCSD.', 1),
(90, 'Millie', 'Niss', 'Millie Niss''s poetry and web installations have been widely read and seen. She was included in a show of visual poetry at Dudley House, Harvard University and has been a featured reader at The Screening Room and for Just Buffalo Literary Center''s Open Reading series.  Her website is www.sporkworld.org.', 1),
(91, 'Martha', 'Deed', 'Martha Deed has published electronic poetry and digital art at www.arteonline.arq.br and www.erasures.net.  Her web site is www.sporkworld.org/Deed.', 1),
(92, 'Dene', 'Grigar', 'Dene Grigar is an Associate Professor of English at Texas Woman''s University and specializes in electronic literature, Greek literature and culture, rhetoric, and feminist theory.', 1),
(93, 'Diana', 'Slattery', 'Diana Slattery is an Associate Director of the Academy of Electronic Media, Rensselaer Polytechnic Institute, Troy, NY, where she researches, designs, and manages the implementation of interactive educational software modules for science, engineering, and the humanities.', 1),
(94, 'Shelly', 'Jackson', 'Shelley Jackson is the author of the short story collection The Melancholy of Anatomy, the hypertext classic PATCHWORK GIRL, several childrenÂ¹s books, and "Skin," a story published in tattoos on the skin of 2095 volunteers. Her first novel Half Life is forthcoming from HarperCollins. She lives in Brooklyn, NY and teaches at the New School. Her website: <http://www.ineradicablestain.com>.', 1),
(95, 'David', 'Daniels', 'David Daniels  was born in Newark, New Jersey on October 11, 1933. He has been making words out of pictures and pictures out of words for over 60 years. He lives in Berkeley, CA. His work "The Gates of Paradise" can be found at www.thegatesofparadise.com', 1),
(96, 'Diane', 'Greco', 'Diane Greco is a writer and editor. She works at Eastgate Systems, the world''s premier publisher of electronic literature, in Watertown, MA.', 1),
(97, 'Chris Keulemans', 'Keulemans', 'The Dutch writer-musician-cultural entrepreneur Chris Keulemans (IWP'' 01)  has for years been building a stunning air castle out of his and others'' memory fragments of pop America....people, we never looked this good, warts and all!!!', 1),
(98, 'Kathleen Ann', 'Goonan', 'http://www.goonan.com/', 1),
(99, ' John', 'Zuern', 'John Zuern is an Associate Professor in the Department of English at the University of Hawai''i at Manoa, where he teaches classes in literary theory, rhetoric, and electronic media. Before joining the English faculty in 1997, he worked as a part-time lecturer in the Graphic Design program in the UH-Manoa Department of Art and as a waiter in a number of Waikiki hotels.', 1),
(100, 'Jason', 'Nelson', 'Being a transplanted Oklahoman in Australia, Jason is slowly adjusting to high set houses and hot, humid keyboards. Aside from being a Lecturer of Digital Writing at Griffith University outside of Brisbane, he is also a forever experimenting electronic poet and net artist. His work has been featured across the world in galleries and journals and people''s bedrooms at four in the morning.', 1),
(101, 'Juliet', 'Davis', 'Juliet Davis is a new media artist/academic/writer, who comes to digital media from the field of English. Her work has appeared in the Tampa Museum of Art, Cyberart\nBilbao, FILE 2004 (Electronic Language International Festival), Dallas 500X, Rhizome ArtBase and other venues. She is a recent recipient of the "Born Digital" Award, presented by the Institute for the Future of the Book (hosted by the University of Southern California''s Annenberg Center for Communication, also funded by The Macarthur Foundation and The Mellon Foundation). Davis is Assistant Professor of Communication at University of Tampa, where she teaches\ntheory and practice in interactive media, visual culture, and writing, with particular interest in cyberfeminism (and, more generally, intersections of gender, identity, and technology). Her most recent academic article, on the topic of aesthetic experience in virtual reality, is scheduled for publication in Intelligent Agent\nMagazine (Publisher/Director: Christiane Paul), and she writes periodically for Rhizome Digest.', 1),
(102, 'Lance', ' Olsen', 'Lance Olsen is author of more than fifteen books of and about innovative fiction. He is a recovering professor who lives somatically in the mountains of central Idaho with his wife, the assemblage-artist Andi Olsen, and digitally at http://www.lanceolsen.com. His novel Nietzsche''s Kisses will appear from FC2 in the spring of 2006.', 1),
(103, 'Tim', 'Guthrie', 'Tim Guthrie is a mixed-media and multi-media artist who has shown nationally and internationally. His work is housed in several permanent collections in museums across the country, as well as numerous private ones. He is an Associate Professor at Creighton University in Omaha. His website is http://timguthrie.creighton.edu/.', 1),
(104, 'Michael', 'Mateas', 'Michael Mateas is an assistant professor at Georgia Tech in the School of Literature, Communication, and Culture and in the College of Computing. His work in expressive AI involves developing new forms of art and entertainment while also advancing AI research goals. His projects include Office Plant #1, Terminal Time, and, with Andrew, the interactive drama FaÃ§ade.', 1),
(105, 'Andrew', 'Stern', 'Andrew Stern is a designer, researcher, writer and engineer of personality-rich, AI-based interactive characters and stories. Previous to co-developing the interactive drama FaÂade, Andrew was a lead designer and software engineer of the award-winning Virtual Babyz, Dogz, and Catz from PF.Magic, which sold over 2 million units worldwide. Andrew''s work has been presented and exhibited at venues such as the Game Developers Conference, SIGGRAPH, ISEA, DAC, DiGRA and AAAI symposia, and has been written about in the New York Times, Newsweek, Wired and AI Magazine. Andrew blogs at grandtextauto.org.', 1),
(106, 'Nick', 'Montfort', 'Nick Montfort is a poet and computer scientist who lives in Philadelphia. He wrote Twisty Little Passages: An Approach to Interactive Fiction(MIT Press, 2003), co-edited The New Media Reader (MIT Press, 2003), and collaborated on several literary projects, including The Ed Report, 2002, Implementation, and Mystery House Taken Over. His interactive fiction includes Winchester''s Nightmare(1999) and Ad Verbum (2000). His website: <http://nickm.com/>.', 1),
(107, 'Scott', 'Rettberg', 'Scott Rettberg is assistant professor of New Media Studies at the Richard Stockton College of New Jersey and associate professor of Humanistic Informatics at the University of Bergen, Norway. He is the co-founder and served as the first executive director of the Electronic Literature Organization. He is co-author of The Unknown, a hypertext novel, co-author of Implementation, a sticker novel, and the author of the email novel Kind of Blue. His website: <http://retts.net>', 1),
(108, 'Brenda', 'Bakker Harger', 'Brenda Bakker Harger is a professor of Entertainment technology at Carnegie Mellon University who is a director (MFA Carnegie Mellon Drama) and an improviser. Harger has focused most of her directing in developing new plays; her new association with technology has presented a new forum of exploration. In addition to having performed as an improviser for the Pittsburgh Chapter Theatresports, and for many years as part of SAK Theatre, she has taught improv in workshops nationally and internationally, and until recently was the Entertainment Director for the Pittsburgh Renaissance Festival.', 1),
(109, 'Jeremy', 'Douglass', 'Jeremy Douglass is a Ph.D. candidate at the University of California at Santa Barbara. His research focuses on interactive fiction and reader response to textual new media. He is a founding member of Writer Response Theory , an online collective dedicated to the exploration of digital character art, and a database/web developer for numerous projects, including the academic search engine Voice of the Shuttle.', 1),
(110, 'ADACHI', 'Tomomi', 'ADACHI Tomomi, born in 1972, is a performer/composer, sound poet and video artist. He studied philosophy and aesthetics at Waseda University, Tokyo. Known for his versatile style, he has performed improvised music (solo as well as with numerous musicians) and contemporary music (works by John Cage, Dieter Schnebel, etc.) with voice, computer and self-made instruments in Japan, United State and Europe. As the only Japanese performer of sound poetry, he performed Kurt Schwitters''s "Ursonate" as a Japan premiere. He also composed works for his punkish choir group "Adachi Tomomi Royal Chorus." and has collaborated with many dancers and dance companies. His video work has been screened at some European film & video festivals. CDs include the solo album, "sparkling materialism" (naya records), Adachi Tomomi Royal Chorus "nu" (naya records) and Adachi Tomomi Royal Chorus "yo"(Tzadik).', 1),
(111, 'Ed', 'Osborn', 'Ed Osborn is a media artist who has presented his work worldwide. His artworks take many forms including installation, video, sculpture, and performance. Ranging from rumbling fans and sounding train sets to squirming music boxes and delicate feedback networks, Osborn''s pieces function as living systems that are by turns playful and oblique, engaging and enigmatic.\n\nOsborn has received grants and residencies from the Guggenheim Foundation, Arts International, the DAAD Artists-in-Berlin Program, Banff Centre for the Arts, and CRCA at UC San Diego.  He has performed and exhibited at ZKM (Karlsruhe), the Berkeley Art Museum, Yerba Buena Center for the Arts (San Francisco), Artspace (Sydney), Kiasma (Helsinki), LACE (Los Angeles), MassMOCA, the Institute of Modern Art (Brisbane), and the Auckland Art Gallery.  He is an Assistant Professor for Digital Media at UC Santa Cruz and is represented by the Catharine Clark Gallery (San Francisco) and Galerie Rachel Haferkamp (Cologne).', 1),
(112, 'Alexis', 'Bhagat', 'Alexis (Lex) Bhagat is a logomaniac from New York City.   After several experiments with therapeutic silence in Vermont (and inspried by the Neoist "Art Strike"), he burned all of his previous writings on December 21st, 1994 and began a 1-year "Poetry Strike," during which time he became bewitched by mircophones, recorders and radios. Charmed, he fell into a dark and lonely gutter of audiophilia, emerging a decade later to find comraderie with the August Sound Coalition webcasting collective and shelter under the transmission arts umbrella of Free103point9.  Notable solo sound compositions include I used to walk all the way from Pleasantdale...  (2001), Whitman Death Songs (2002), Lecture regarding Sound as Art  (2003), Bandshell Ghost   and Lecture on the Possibilitiy of Life without the Sun (both 2004.)\n\nSince 2002, he has been in collaboration with Gregory Gangemi and Jason Quarles on Sound Generation- a collection of interviews with 24 contemporary sound artists, cut up into a polyvocal colloquy.   (Forthcoming from Autonomedia.) His tangential musings and investigations on sound and liberation are periodically disseminated through his occasional publication, Tactical Sound.\nMORE:', 1),
(113, 'Paul', 'DeMarinis', 'Paul DeMarinis has been working as an electronic media artist since 1971 and has created numerous performance works, sound and computer installations and interactive electronic inventions. He has performed internationally, at The Kitchen, Festival d''Automne a Paris, Het Apollohuis in Holland and at Ars Electronica in Linz. He has also created music for Merce Cunningham Dance Co. His interactive audio artworks have been shown at the I.C.C. in Tokyo, Bravin Post Lee Gallery in New York and The Museum of Modern Art in San Francisco. He has been an Artist-in-Residence at The Exploratorium and at Xerox PARC and has received major awards and fellowships in both Visual Arts and Music from The National Endowment for the Arts, N.Y.F.A., N.Y.S.C.A., the John Simon Guggenheim Foundation, the Rockefeller Foundation New Media Award, and the D.A.A.D. Berlin Artist Fellowship. Much of his work involves speech processed and synthesized by computers, available on the Lovely Music Ltd. compact disc "Music as a Second Language", and the Apollohuis CD "A Listener''s Companion." Major installation works include "The Edison Effect" that uses optics and computers to make new sounds by scanning ancient phonograph records with lasers, "Gray Matter" that uses the interaction of body and electricity to make music, and "The Messenger" and "Firebirds" that examine the myths of electrical communication. Public artworks include large-scale interactive installations at Park Tower Hall in Tokyo, at the 1996 Olympics in Atlanta and Expo 1998 in Lisbon and an interactive audio environment at the Ft. Lauderdale International Airport in 2003.', 1),
(114, 'Brandon', 'Labelle', 'Brandon LaBelle is an artist and writer working with the specifics of location. Through his work with Errant Bodies Press he has co-edited the anthologies "Site of Sound: Of Architecture and the Ear", "Writing Aloud: The Sonics of Language", and "Surface Tension: Problematics of Site". He initiated and curated the Beyond Music series and festivals from 1997 - 2002 at Beyond Baroque Literary/Arts Center in Los Angeles, and in 2001 he organized "Social Music", a radio series for Kunstradio ORF, Vienna. His installation work has been featured in exhibitions and festivals internationally, including "Sound as Media"(2000) ICC Tokyo,"Pleasure of Language"(2002) Netherlands Media Institute, and "Undercover"(2003) Museet for Samtidskunst, Roskilde, and his writings have been included in various books and journals, including "Experimental Sound and Radio" (MIT) and "Soundspace Architecture for Sound and Vision" (BirkhÃ¤user). He presented a solo exhibition at Singuhr galerie in Berlin in 2004 and an experimental composition for public performance as part of Virtual Territories, Nantes, 2005.', 1),
(115, 'Douglas', 'Kahn', 'Douglas Kahn is founding Director of Technocultural studies at University of California at Davis. With research concentrations in auditory culture, the history and theory of sound in the arts, and the arts and technology, he is the author of Noise, Water, Meat: A History of Sound in the Arts (MIT Press, 1999), coeditor of Wireless Imagination: Sound, Radio and the Avant-garde (MIT Press, 1992); an editor of Leonardo Music Journal, Senses and Society, and a new book series from University of California Press : Technoculture and the Arts. He is currently researching the artistic and cultural trade in acoustics and electromagnetics under the auspices of a 2006-2007 Guggenheim Fellowship', 1),
(116, 'Ben', 'Basan', 'Benjamin Basan is a Ph.D. candidate in English at the University of Iowa. He was raised in Texas and England, but prefers to call Tokyo home. His research interests revolve around intermedia, contemporary poetry and poetics, procedural architecture, nationalisms, and anarchism. In addition to editing The Iowa Review Web, he is Managing Editor of Factorial.org - an organisation promoting Japanese poetry in English.', 1),
(117, 'Sandy', 'Baldwin', 'Sandy Baldwin is Assistant Professor of English and Director of the Center for Literary Computing at West Virginia University. Under his leadership, the CLC develops projects such as The Phenomenology of the Virtual, an ongoing collaboration with the artist/theorist Alan Sondheim on experience and performance in virtual environments and The Plain_Text Project, facilitating discussion and debate on the agency and programming of writing technologies. He has a forthcoming book on nanotechnology and cultural theory, annother forthcoming book co-written with Alan Sondheim on the analog and the digital, and another book in progress on codework and poetics. Baldwin was a member of several groups pioneering chat room poetry and performance in the early 1990''s, with widely published work and performances around the world (including at Lollapalooza). His recent creative work focuses on interactive spatial poetry in computer game environments and hybrids of machinima, video, and codework.', 1),
(118, 'Aya', 'Karpinska', 'Aya Karpinska is a digital media artist and interaction designer. As the 2006 Electronic Writing fellow at Brown University, her current work focuses on narrative and digital technology. Her diverse output includes computer music, fiction, poetry, web and graphic design, and game design. Her 3-D poetry has been featured in such venues as p0es1s, a digital poetry exhibition in Berlin, Germany, and the Fourth International Digital Art Exhibit and Colloquium in Havana, Cuba. She received her Master''s degree from the Interactive Telecommunications Program at New York University.\n\nhttp://technekai.com', 1),
(119, 'David', 'Knoebel', 'Artist/Writer David Knoebel was born in a small town in the US. His creative life began at age 2 with crayons and a pile of shirtboards. He studied at Yale University and the Skowhegan School of Painting and Sculpture. His wire-and-light installations have been shown in New York City at P.S.1, the Hal Bromm Gallery, and elsewhere.\n\nKnoebel''s web page, "Click Poetry," first appeared in 1996. His work has been featured on Compuserve, About.com, Light & Dust, Zn, trAce, Webartery, Web3D/VRML 2000, the International Computer Graphics Festival, Infos2000, The Poets'' Place, netart00, Riding the Meridian, Jumpin'' at the Diner, FILE, and Cauldron & Net.', 1),
(120, 'Dan', 'Waber', 'Dan Waber wears many hats. He is by turns a poet, a visual poet, a sound poet, a performance poet, a playwright, a digital artist, a multimedia artist, a visual artist, a mail artist, a teacher, an editor, a publisher, a self-publisher, an anthologist, an inveterate list maker, and more!\n\nRecent work has appeared or is forthcoming in Brown University''s Atopia Journal, Toronto''s The Scream Literary Festival, Cleveland''s Blends & Bridges:  A Survey of International Contemporary Visual Poetry & Related Art, and more! Current and upcoming books include, The ABC Boys, The First Adventures of Col and Sem, The Temptation of a Gracious Flower (with Sheila E. Murphy), Vox Poetica, and more! For the more digitally inclined, he maintains an ever expanding suite of projects at logolalia.com that currently includes the altered books project, the minimalist concrete poetry site, un hommage au lettrism, and the 40x365 project, and more!', 1),
(121, 'Jason', 'Pimble', NULL, 1),
(122, ' Donna', 'Leishman', 'My art background exposed me to the differences between applied and\nexperimental artifacts. As an undergraduate student, my interests somewhat\nproblematically seemed to span disciplines. For example, I studied\nIllustration and Printmaking but worked at different points in porcelain and\npaint, creating sculptural works and 5 foot drawings. The computer was\nsimply used to help present these unconventional illustrations in a folio.\nThe aesthetic and emotional tone of my work seemed more like "Fine Art,"\nhowever I found this still wasn''t a good fit&mdash;at that time Fine Art had taken\na decidedly conceptual, minimalist, and installation turn. Three important\nfinds came out of this period&mdash;my interest in folkloric subject matter, the\nsequential arts, and the sense that I was an artist placed between existing\nfields.\n\nMy commercial grounding was fortuitously timed as I began an internship in a\nScottish new media company at the forefront of web and screen-based design.\nOnce there, I was exposed to an entirely different world of clients and\nshort deadlines, a place where research and the personal voice were for the\nmost part redundant. What I did learn was how to meet a deadline and plan\nwork&mdash;importantly, how to map out large interactive websites. Many of the\nsenior designers in this company were avidly publishing experimental\n"personal" websites, often using Director and a new software called\nMacromedia [now Adobe] Flash. In Flash I found a tool that encouraged me to\nreturn to my art school themes. I found that there was very little web work\nbeing done in visual narrative or folk tales that experimented with\nsequences and that used meaningful interactivity. After a spell working in a\nNew York animation studio (Bullseyeart), I finally returned to Scotland to\ncomplete a Masters in Design where I produced RedRidinghood.\n\nA mix of commercial freelance work, PhD stipend and lecturing allowed me\ncontinue researching and developing projects during my doctoral period. At\nthe time of my viva I took on a post at Duncan of Jordanstone College of Art\n& Design in Dundee Scotland as course director in Illustration, since then I''ve branched into postgraduate supervision and continued to explore new media narrative and digital aesthetics by exhibition, papers and lectures. I am currently developing a project around folkloric precedents in female consumption.', 1),
(124, 'Marjorie', 'Coverley Luesebrink', NULL, 1),
(125, 'Elizabeth', 'Knipe', 'Elizabeth Knipe is a digital writer and experimental video artist who has a tendency to convert simple ideas into interactive electronic installations and web-based media. Though she has a non-poetic day job, she finds that a certain poetic justice is involved. Elizabeth has screened her videos nationwide and read at E-Poetry events in London, New York, West Virginia, and Buffalo. She received her MFA from the Department of Media Study at the University at Buffalo. See a selection of her work online at dreamdilation.com', 1),
(126, 'Shawn', 'Rider', 'Shawn Rider is a writer, artist and web developer, currently located in Alexandria, Virginia where he spends his days working on educational projects for PBS and his nights toiling away on strange websites. Shawn''s writing and interactive work has previously been featured in venues such as The Electronic Literature Collection vol. 1, The Best of The Phone Book, Sync magazine and the Washington DC Film Festival. You can find the latest updates on his work at his online hub, ShawnRider.com.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tirwRelationalArticlesToAuthors`
--

DROP TABLE IF EXISTS `tirwRelationalArticlesToAuthors`;
CREATE TABLE IF NOT EXISTS `tirwRelationalArticlesToAuthors` (
`tirwRelArtToAuthId` int(11) NOT NULL,
  `tirwContributorId` int(11) DEFAULT NULL,
  `tirwArticleId` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=164 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tirwRelationalArticlesToAuthors`
--

INSERT INTO `tirwRelationalArticlesToAuthors` (`tirwRelArtToAuthId`, `tirwContributorId`, `tirwArticleId`) VALUES
(1, 3, 1),
(3, 6, 2),
(4, 7, 3),
(5, 9, 4),
(6, 10, 5),
(7, 11, 6),
(8, 11, 7),
(9, 12, 8),
(10, 13, 8),
(11, 14, 9),
(12, 15, 10),
(13, 22, 11),
(14, 21, 12),
(15, 19, 13),
(16, 20, 13),
(17, 18, 14),
(18, 17, 15),
(19, 16, 16),
(20, 9, 17),
(21, 23, 18),
(22, 24, 19),
(23, 25, 20),
(24, 26, 20),
(25, 27, 20),
(26, 28, 20),
(27, 29, 21),
(28, 30, 24),
(29, 32, 26),
(30, 29, 22),
(31, 31, 25),
(32, 33, 27),
(33, 34, 28),
(34, 35, 29),
(35, 36, 30),
(36, 37, 31),
(37, 38, 31),
(38, 39, 32),
(39, 40, 32),
(40, 41, 33),
(41, 94, 33),
(42, 42, 34),
(43, 43, 34),
(44, 44, 34),
(45, 45, 35),
(46, 46, 36),
(47, 47, 37),
(48, 48, 37),
(49, 49, 37),
(50, 50, 38),
(51, 51, 39),
(52, 52, 39),
(53, 53, 40),
(54, 54, 41),
(55, 56, 42),
(56, 55, 42),
(57, 57, 43),
(58, 58, 43),
(59, 36, 44),
(60, 59, 44),
(61, 60, 45),
(62, 61, 47),
(63, 62, 47),
(64, 9, 48),
(65, 16, 48),
(66, 40, 49),
(67, 39, 49),
(68, 40, 50),
(69, 63, 50),
(70, 64, 51),
(71, 66, 51),
(72, 65, 51),
(73, 67, 51),
(74, 3, 51),
(75, 68, 52),
(76, 69, 52),
(77, 25, 53),
(78, 70, 53),
(79, 34, 54),
(80, 40, 54),
(81, 71, 55),
(82, 72, 55),
(83, 73, 56),
(84, 73, 56),
(85, 64, 57),
(86, 74, 57),
(87, 75, 58),
(88, 76, 58),
(89, 77, 58),
(90, 78, 58),
(91, 25, 59),
(92, 79, 59),
(93, 80, 59),
(94, 81, 59),
(95, 82, 59),
(96, 83, 59),
(97, 85, 60),
(98, 84, 60),
(99, 86, 61),
(100, 87, 61),
(101, 88, 61),
(102, 89, 61),
(103, 90, 62),
(104, 91, 62),
(105, 95, 62),
(106, 92, 63),
(107, 93, 63),
(108, 96, 23),
(151, 70, 123),
(111, 88, 83),
(150, 59, 122),
(113, 98, 87),
(114, 99, 89),
(115, 91, 90),
(116, 90, 90),
(117, 100, 91),
(118, 101, 92),
(119, 102, 93),
(120, 103, 93),
(121, 104, 94),
(122, 105, 94),
(123, 106, 95),
(124, 82, 96),
(125, 108, 97),
(126, 109, 99),
(127, 107, 98),
(128, 107, 100),
(129, 110, 101),
(130, 111, 102),
(131, 112, 103),
(132, 113, 104),
(133, 114, 105),
(134, 115, 106),
(135, 116, 107),
(136, 41, 108),
(137, 63, 108),
(138, 48, 109),
(139, 117, 110),
(140, 63, 111),
(141, 41, 112),
(142, 41, 113),
(143, 119, 114),
(144, 118, 115),
(145, 41, 117),
(146, 121, 118),
(147, 120, 118),
(148, 41, 119),
(149, 117, 121),
(152, 73, 124),
(153, 125, 125),
(154, 126, 126),
(155, 126, 127),
(156, 63, 128),
(157, 87, 129),
(158, 100, 130),
(159, 122, 130),
(160, 122, 131),
(161, 122, 132),
(162, 100, 133),
(163, 100, 134);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `soRandom`
--
ALTER TABLE `soRandom`
 ADD PRIMARY KEY (`sr_ID`), ADD KEY `narrator` (`sr_narrator`,`sr_type`), ADD FULLTEXT KEY `text` (`sr_text`);

--
-- Indexes for table `tirwArticles`
--
ALTER TABLE `tirwArticles`
 ADD PRIMARY KEY (`tirwArticleId`);

--
-- Indexes for table `tirwContributors`
--
ALTER TABLE `tirwContributors`
 ADD PRIMARY KEY (`tirwContributorId`);

--
-- Indexes for table `tirwRelationalArticlesToAuthors`
--
ALTER TABLE `tirwRelationalArticlesToAuthors`
 ADD PRIMARY KEY (`tirwRelArtToAuthId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `soRandom`
--
ALTER TABLE `soRandom`
MODIFY `sr_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `tirwArticles`
--
ALTER TABLE `tirwArticles`
MODIFY `tirwArticleId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `tirwContributors`
--
ALTER TABLE `tirwContributors`
MODIFY `tirwContributorId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `tirwRelationalArticlesToAuthors`
--
ALTER TABLE `tirwRelationalArticlesToAuthors`
MODIFY `tirwRelArtToAuthId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=164;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
