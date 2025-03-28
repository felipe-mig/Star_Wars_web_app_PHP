-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2025 at 06:25 AM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starwarsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `alienraces`
--

CREATE TABLE `alienraces` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `bio` varchar(1000) NOT NULL,
  `episodeiv` text NOT NULL,
  `episodev` text NOT NULL,
  `episodevi` text NOT NULL,
  `thumbernail` text NOT NULL,
  `imageone` text NOT NULL,
  `imagetwo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alienraces`
--

INSERT INTO `alienraces` (`id`, `name`, `bio`, `episodeiv`, `episodev`, `episodevi`, `thumbernail`, `imageone`, `imagetwo`) VALUES
(4, 'tusken raiders', 'Tusken Raiders, or Sand People as they are sometimes known, wear abundant clothing to protect themselves from Tatooine’s twin suns. The strong beings pursue a nomadic existence in some of Tatooine’s most desolate regions. They fear little, and make sudden raids on local settlers.', 'true', 'false', 'false', 'Tusken Thumbnail.webp', 'Tusken Img1.webp', 'Tusken Img2.webp'),
(5, 'wampa', 'Wampas are powerful furred bipeds that dwell in the snowy wastes of the ice world Hoth. These hulking predators have razor-sharp fangs and claws, yet move with surprising stealth, relying on their white fur for camouflage while hunting prey such as tauntauns. A wampa attacked Luke Skywalker outside Echo Base, killing Luke’s tauntaun and dragging the rebel commander away. An injured Luke awoke to find himself upside-down in the wampa’s lair, his feett frozen into the cavern ceiling. Luke used the Force to call his lightsaber to his hand, cut himself free, and severed the wampa’s arm with a quick stroke.', 'false', 'true', 'false', 'wampaThumbernail.webp', 'wampaImg1.webp', 'wampaImg2.webp'),
(6, 'gand', 'An insectoid being with compound eyes, Zuckuss was a Force-sensitive male Gand born on his species\' homeworld of Gand as one of the planet\'s traditional findsmen.', 'false', 'true', 'false', 'zuckussThumbernail.webp', 'zuckussImg1.webp', 'zuckussImg2.webp'),
(7, 'yoda\'s species', 'Members of the species were much shorter than an average Human, most standing below 70 centimeters, with lifespans of many hundreds of years (though their average lifespan is unknown because all known members of the species were Jedi, who generally lived longer than ordinary members of a species). Adults of the species were characterized by sharp, elfin ears, ridges on their foreheads, tridactyl hands and (most commonly) anisodactyl feet. Their leathery skin and blood were both light green. Their sharp teeth suggested a carnivorous diet. The diet of the most famous member of the species, Jedi Master Yoda, consisted of nutrients most other beings considered disgusting.', 'false', 'true', 'true', 'yodaThumbernail.webp', 'yodaImg1.webp', 'yodaImg2.webp'),
(8, 'sullustan', 'Sullustans are humanoid beings from the planet Sullust with two flaps of jowls aound their cheeks; Nien Nunb, co-pilot to Lando Calrissian in the Battle of Endor, was a notable Sullustan.', 'false', 'false', 'true', 'nienNubnThumbernail.webp', 'nienNubnImg1.webp', 'nienNubnImg2.webp'),
(9, 'jawa', 'Jawas are meter-tall humanoids completely hidden behind rough, hand-woven robes. Their faces are concealed within the dark folds of a cowl, from which peer their sickly glowing yellow eyes. They comb the deserts of Tatooine in search of discarded scrap and wayward mechanicals. Using their cobbled-together weaponry, they can incapacitate droids and drag them to their treaded fortress-homes, immense sand-scarred vehicles known as sandcrawlers. They sell their hastily refurbished junk to moisture farmers who are hard-pressed to find a better selection elsewhere', 'true', 'false', 'false', 'jawaThumbernail.webp', 'jawaImg1.webp', 'jawaImg2.webp'),
(10, 'hutt', 'Hutts are large, slug-like creatures known to be gangsters. They control Tatooine and are involved in organized crime throughout the galaxy.', 'true', 'false', 'true', 'jabba the hutThumbernail.webp', 'jabba the hutImg1.webp', 'jabba the hutImg2.webp'),
(11, 'ewok', 'The Ewoks are sentient furred bipeds native to the moon of Endor. They are curious individuals that stand about one meter tall. They are extremely skilled in forest survival and the construction of primitive technology like gliders and catapults. They are quick learners when exposed to advanced technology, however. The Ewoks accepted members of the Rebel Alliance into their tribe, and allied themselves to their cause. The Ewoks helped in the ground battle to destroy the Imperial shield generator built in their forests, and their primitive weapons felled the stormtroopers and the scout walkers of the Empire. Their help paved the way to victory at the Battle of Endor.', 'false', 'false', 'true', 'Ewok Thumbernail.webp', 'Ewok Img1.webp', 'Ewok Img2.webp'),
(12, ' trandoshan', 'Trandoshans are reptilian humanoids, with slimy, scaled-skin. They have long arms and legs, and are known to be excellent hunters. In Mos Espa, a rowdy group of the species has been known to try their luck at the gambling tables in Garsa\'s Sanctuary.', 'false', 'true', 'false', 'boskkThumbernail.webp', 'boskkImg1.webp', 'boskkImg2.webp'),
(13, 'mon calamari', 'The Mon Calamari people are a humanoid, aquatic species with high-domed heads, webbed hands and large, goggle-like eyes. They hail from the oceans of Mon Cala, a planet they share with the Quarren. During the Clone Wars, differences between the two cultures were fanned by Separatist troublemakers to erupt in civil war. During the Galactic Civil War, the Mon Calamari were said to be the soul of the Rebel Alliance. The Empire pressed these gentle, amphibious people into war by subjugating their watery world. In retaliation, the Mon Calamari became one of the key species of the Rebellion, supplying badly needed warships to the outnumbered Alliance fleet.', 'false', 'false', 'true', 'almirant ackbarThumbernail.webp', 'almirant ackbarImg1.webp', 'almirant ackbarImg2.webp'),
(14, ' wookiee', 'Shaggy giants from an arboreal world, the tall and commanding Wookiee species is an impressive sight to even the most jaded spacer. Despite their fearsome and savage countenance, Wookiees are intelligent, sophisticated, loyal and trusting. Loyalty and bravery are near-sacred tenets in Wookiee society. When peaceful, Wookiees are tender and gentle. Their tempers, however, are short; when angered, Wookiees can fly into a berserker rage and will not stop until the object of their distemper is sufficiently destroyed.', 'true', 'true', 'true', 'chewbaccaThumbernail.webp', 'chewbaccaImg1.webp', 'chewbaccaImg2.webp');

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `affiliation` text NOT NULL,
  `bio` varchar(1000) NOT NULL,
  `episodeiv` text NOT NULL,
  `episodev` text NOT NULL,
  `episodevi` text NOT NULL,
  `thumbernail` text NOT NULL,
  `imageone` text NOT NULL,
  `imagetwo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `name`, `affiliation`, `bio`, `episodeiv`, `episodev`, `episodevi`, `thumbernail`, `imageone`, `imagetwo`) VALUES
(22, 'wedge antilles', 'Rebel Alliance', 'A talented young rebel pilot from Corellia, Wedge Antilles survived the attack on the first Death Star to become a respected veteran of Rogue Squadron. He piloted a snowspeeder in the defense of Echo Base on Hoth, and led Red Squadron in the rebel attack on the second Death Star above Endor.', 'true', 'true', 'true', 'wedgeThumbernail.webp', 'wedgeImg1.webp', 'wedgeImg2.webp'),
(23, 'jek porkins', 'Rebel Alliance', 'Jek Porkins was a pilot and trader who abandoned his homeworld when the Empire moved in and developed a new military base there. The burly rebel pilot flew an X-wing at the Battle of Yavin under the call sign Red 6. His X-wing developed a mechanical problem early in the battle, leaving him struggling to maneuver. Before Porkins or his astromech could fix the problem, one of the Death Star’s turbolasers zeroed in on the X-wing, incinerating it and killing Porkins instantly.', 'true', 'false', 'false', 'porkinsThumbernail.webp', 'porkinsImg1.webp', 'porkinsImg2.webp'),
(24, 'admiral ozzel', 'Galactic Empire', 'Admiral Ozzel commanded the Super Star Destroyer Executor, Darth Vader\'s mighty flagship and the linchpin of the squadron searching the galaxy for the Alliance\'s secret base. Ozzel led the initial attack on Hoth, but his choice of tactics infuriated Vader, leading to a sudden and permanent demotion.', 'false', 'true', 'false', 'admiral ozzelThumbernail.webp', 'admiral ozzelImg1.webp', 'admiral ozzelImg2.webp'),
(25, ' admiral ackbar', 'Rebel Alliance', 'A veteran commander, Ackbar led the defense of his homeworld, Mon Cala, during the Clone Wars and then masterminded the rebel attack on the second Death Star at the Battle of Endor. Ackbar realized the rebels had been drawn into a trap at Endor, but adjusted, with his fleet buying valuable time for the attack to succeed. After the Battle of Endor, Ackbar became a Grand Admiral in the New Republic, winning many victories including the pivotal Battle of Jakku. He retired to Mon Cala, but was coaxed back into service with the Resistance by Leia Organa', 'false', 'false', 'true', 'almirant ackbarThumbernail.webp', 'almirant ackbarImg1.webp', 'almirant ackbarImg2.webp'),
(26, ' at-at pilots', 'Galactic Empire', 'The Empire’s combat drivers are trained to handle everything in the Imperial ground arsenal, but AT-AT pilots see themselves as elite, controlling their massive four-footed assault vehicles in combat against Rebel targets. While driving early models of their massive walking tanks, AT-AT pilots nearly annihilated the Ghost crew and three surviving clones on Seelos, and later obeyed General Veers’ orders during the Empire’s advance on Hoth’s Echo Base, destroying numerous snowspeeders and blasting apart the Rebels’ ground defenses.\r\n\r\n', 'false', 'true', 'false', 'AT-AT pilotThumbernail.webp', 'AT-AT pilotImg1.webp', 'AT-AT pilotImg2.webp'),
(27, 'bossk', 'Galactic Empire', 'One of the most feared bounty hunters of the galaxy, Bossk used his natural Trandoshan hunting instincts to capture his prey. During the Clone Wars, the red-eyed reptilian partnered with Aurra Sing, Castas and young Boba Fett. Bossk didn\'t care much for vendettas or politics. He was in it to get paid. After a brief stint in a Republic prison, Bossk continued his partnership with Fett, becoming a bodyguard to the teen bounty hunter. Decades later, Bossk answered Darth Vader\'s call to capture the Millennium Falcon after the Battle of Hoth, an assignment that put him in direct competition with Boba.', 'false', 'true', 'false', 'boskkThumbernail.webp', 'boskkImg1.webp', 'boskkImg2.webp'),
(28, 'c-3po', 'Rebel Alliance', 'C-3PO longs for more peaceful times, but his continued service to the Resistance — and his knowledge of more than seven million forms of communication — keeps the worry-prone droid in the frontlines of galactic conflict. Programmed for etiquette and protocol, Threepio was built by a young Anakin Skywalker, and has been a constant companion to astromech R2-D2. Over the years, he was involved in some of the galaxy’s most defining moments and thrilling battles. Since the Empire’s defeat, C-3PO has served Leia Organa, head of a Resistance spy ring aimed at undermining the First Order.', 'true', 'true', 'true', 'c3poThumbernail.webp', 'c3poImg1.webp', 'c3poImg2.webp'),
(29, ' chewbacca', 'Rebel Alliance', 'A legendary Wookiee warrior and Han Solo’s longtime co-pilot, Chewbacca continues to serve as faithful first mate to carry out daring missions against the First Order behind the controls of the Millennium Falcon. Known as Chewie to his closest friends, he was part of a core group of rebels who restored freedom to the galaxy during the reign of the Galactic Empire. Known for his short temper and accuracy with a bowcaster, Chewie also has a big heart and unwavering loyalty to his friends.', 'true', 'true', 'true', 'chewbaccaThumbernail.webp', 'chewbaccaImg1.webp', 'chewbaccaImg2.webp'),
(30, 'general veers', 'Galactic Empire', 'A cool and efficient officer, General Veers led the Imperial assault on Hoth, marching his AT-AT walkers across the planet\'s frozen plains and destroying the massive generators powering the Rebel base\'s protective energy shield.', 'false', 'true', 'false', 'general veersThumbernail.webp', 'general veersImg1.webp', 'general veersImg2.webp'),
(31, ' wampa', 'none', 'Wampas are powerful furred bipeds that dwell in the snowy wastes of the ice world Hoth. These hulking predators have razor-sharp fangs and claws, yet move with surprising stealth, relying on their white fur for camouflage while hunting prey such as tauntauns. A wampa attacked Luke Skywalker outside Echo Base, killing Luke’s tauntaun and dragging the rebel commander away. An injured Luke awoke to find himself upside-down in the wampa’s lair, his feett frozen into the cavern ceiling. Luke used the Force to call his lightsaber to his hand, cut himself free, and severed the wampa’s arm with a quick stroke.', 'false', 'true', 'false', 'wampaThumbernail.webp', 'wampaImg1.webp', 'wampaImg2.webp'),
(32, ' zuckuss', 'Galactic Empire', 'A Gand bounty hunter, Zuckuss heeded the Empire\'s call for mercenaries to locate the Millennium Falcon and bring her fugitive crew to justice, receiving his orders on the bridge of Darth Vader\'s Super Star Destroyer.', 'false', 'true', 'false', 'zuckussThumbernail.webp', 'zuckussImg1.webp', 'zuckussImg2.webp'),
(33, ' darth vader', 'Galactic Empire', 'Once the heroic Jedi Knight named Anakin Skywalker, Darth Vader was seduced by the dark side of the Force. Forever scarred by his defeat on Mustafar, Vader was transformed into a cybernetically-enhanced Sith Lord. At the dawn of the Empire, Vader led the Empire’s eradication of the Jedi Order and the search for survivors. He remained in service of the Emperor -- the evil Darth Sidious -- for decades, enforcing his Master’s will and seeking to crush the Rebel Alliance and other detractors. But there was still good in him…', 'true', 'true', 'true', 'darth-vaderThumbernail.webp', 'darth-vaderImg1.webp', 'darth-vaderImg2.webp'),
(35, 'the emperor', 'Galactic Empire', 'The dark side of the Force is a pathway to many abilities some consider to be unnatural, and Sheev Palpatine is the most infamous follower of its doctrines. Scheming, powerful, and evil to the core, Darth Sidious restored the Sith and destroyed the Jedi Order. Living a double life, he was also Palpatine, a Naboo Senator and phantom menace. He manipulated the political system of the Galactic Republic until he was named Supreme Chancellor -- and eventually Emperor – and ruled the galaxy through fear and tyranny. The galaxy rejoiced when he died at the Battle of Endor, but Sidious had cheated death and patiently plotted a return to power.', 'false', 'true', 'true', 'emperor palpatineThumbernail.webp', 'emperor palpatineImg1.webp', 'emperor palpatineImg2.webp'),
(36, 'grand moff tarkin', 'Galactic Empire', 'An ambitious, ruthless proponent of military power, Wilhuff Tarkin became a favorite of Supreme Chancellor Palpatine and rose rapidly through the Imperial ranks. Shortly after the Empire\'s creation, he was put in charge of the construction of the Death Star. Tarkin saw the Death Star as a way to crush all dissent to the Empire\'s rule -- fear of the station\'s planet-killing superlaser would keep the galaxy\'s star systems in line. He demonstrated the station\'s power by destroying Alderaan, but died soon afterwards when the Death Star itself was destroyed.', 'true', 'false', 'false', 'grand moff tarkinThumbernail.webp', 'grand moff tarkinImg1.webp', 'grand moff tarkinImg2.webp'),
(37, 'han-solo', 'Rebel Alliance', 'Han Solo rose from an impoverished childhood on the mean streets of Corellia to become one of the heroes of the Rebel Alliance. As captain of the Millennium Falcon, Han and his co-pilot Chewbacca came to believe in the cause of galactic freedom, joining Luke Skywalker and Princess Leia Organa in the fight against the Empire. After the Battle of Endor, Han faced difficult times in a chaotic galaxy, leading to a shattering confrontation with his estranged son Ben.', 'true', 'true', 'true', 'han-soloThumbernail.webp', 'han-soloImg1.webp', 'han-soloImg2.webp'),
(38, ' ig-88', 'Galactic Empire', 'Many people in the galaxy fear droids, what with the memories of the Clone Wars still fresh in their minds. Far more terrifying than battle droids were assassin droids, independently programmed mechanical killers that had no masters. IG-88 is a battered chrome war droid who has become a bounty hunter, and answered Darth Vader\'s call to capture the Millennium Falcon during the events surrounding the Battle of Hoth.', 'false', 'true', 'false', 'ig88Thumbernail.webp', 'ig88Img1.webp', 'ig88Img2.webp'),
(39, ' jabba the hutt', 'none', 'Jabba the Hutt was one of the galaxy’s most powerful gangsters, with far-reaching influence in both politics and the criminal underworld. There were no second chances with Jabba, something Han Solo would find out -- though the slug-like alien would ultimately fall victim to his own hubris and vengeful ways.', 'true', 'false', 'true', 'jabba the hutThumbernail.webp', 'jabba the hutImg1.webp', 'jabba the hutImg2.webp'),
(40, ' jawa', 'none', 'Jawas are meter-tall humanoids completely hidden behind rough, hand-woven robes. Their faces are concealed within the dark folds of a cowl, from which peer their sickly glowing yellow eyes. They comb the deserts of Tatooine in search of discarded scrap and wayward mechanicals. Using their cobbled-together weaponry, they can incapacitate droids and drag them to their treaded fortress-homes, immense sand-scarred vehicles known as sandcrawlers. They sell their hastily refurbished junk to moisture farmers who are hard-pressed to find a better selection elsewhere', 'true', 'false', 'true', 'jawaThumbernail.webp', 'jawaImg1.webp', 'jawaImg2.webp'),
(41, 'lando calrissian', 'Rebel Alliance', 'Lando Calrissian may have come late to the fight against the Empire, but his role in destroying the second Death Star cemented his reputation as a hero. In his youth, Lando was a sportsman seeking a fortune at the sabacc tables. After he lost his beloved ship to Han Solo, Lando spent years living the high life and pursuing get-rich-quick schemes, with uneven results. He went semi-respectable as the baron administrator of Cloud City, only to be drawn into the fight against the Empire. After a personal tragedy, Lando sought solace in isolation on Pasaana, unaware that the galaxy would need him again.', 'false', 'true', 'true', 'landoCalrissianThumbernail.webp', 'landoCalrissianImg1.webp', 'landoCalrissianImg2.webp'),
(42, 'lobot', 'none', 'Never far from Baron Administrator Lando Calrissian\'s side was Lobot, Calrissian\'s aide and Cloud City\'s computer liaison officer. Lobot is a human male with a shiny, brain-enhancing device wrapped around the back of his skull that allowed him to contact directly with the city\'s central computer.', 'false', 'true', 'false', 'lobotThumbernail.webp', 'lobotImg1.webp', 'lobotImg2.webp'),
(43, 'luke skywalker', 'Rebel Alliance', 'Luke Skywalker was a Tatooine farmboy who rose from humble beginnings to become one of the greatest Jedi the galaxy has ever known. Along with his friends Princess Leia and Han Solo, Luke battled the evil Empire, discovered the truth of his parentage, and ended the tyranny of the Sith. A generation later, the location of the famed Jedi master was one of the galaxy’s greatest mysteries. Haunted by Ben Solo’s fall to evil and convinced the Jedi had to end, Luke sought exile on a distant world, ignoring the galaxy’s pleas for help. But his solitude would be interrupted – and Luke Skywalker had one final, momentous role to play in the struggle between good and evil.', 'true', 'true', 'true', 'lukeThumbernail.webp', 'lukeImg1.webp', 'lukeImg2.webp'),
(44, 'moff jerjerrod', 'Galactic Empire', 'A chilly technocrat, Tiaan Jerjerrod was responsible for overseeing construction of the second Death Star above the forest moon of Endor. The task was difficult, to say the least -- Jerjerrod desperately needed more time and more resources. What he got instead was a visit from Darth Vader.', 'false', 'false', 'true', 'moff jerjerrodThumbernail.webp', 'moff jerjerrodImg1.webp', 'moff jerjerrodImg2.webp'),
(45, 'nien nunb', 'Rebel Alliance', 'A native of Sullust, Nien Nunb was a smuggler who fought for both the Rebel Alliance and the Resistance during his long career. An expert pilot, he served as Lando Calrissian’s co-pilot aboard the Millennium Falcon during the Battle of Endor, flew an X-wing in the raid on Starkiller Base and survived the First Order’s assault on Crait. He was then killed fighting for freedom at Exegol.', 'false', 'false', 'true', 'nienNubnThumbernail.webp', 'nienNubnImg1.webp', 'nienNubnImg2.webp'),
(46, 'obi-wan kenobi', 'Rebel Alliance', 'A legendary Jedi Master, Obi-Wan Kenobi was a noble man and gifted in the ways of the Force. He trained Anakin Skywalker, served as a general in the Republic Army during the Clone Wars, and guided Luke Skywalker as a mentor.', 'true', 'true', 'true', 'Obi-Wan-KenobiThumbernail.webp', 'Obi-Wan-KenobiImg1.webp', 'Obi-Wan-KenobiImg2.webp'),
(47, ' leia organa', 'Rebel Alliance', 'Princess Leia Organa was one of the greatest leaders of the Rebel Alliance, fearless on the battlefield and dedicated to ending the Empire’s tyranny. Daughter of Padmé Amidala and Anakin Skywalker, sister of Luke Skywalker, and with a soft spot for scoundrels, Leia ranked among the galaxy’s great heroes. But life under the New Republic proved difficult for her. Sidelined by a new generation of political leaders, she struck out on her own to oppose the First Order as founder of the Resistance. These setbacks in her political career were accompanied by more personal losses, which she endured with her seemingly inexhaustible will.', 'true', 'true', 'true', 'princess leiaThumbernail.webp', 'princess leiaImg1.webp', 'princess leiaImg2.webp'),
(48, ' r2-d2', 'Rebel Alliance', 'A reliable and versatile astromech droid, R2-D2 has served Padmé Amidala, Anakin Skywalker, and Luke Skywalker in turn, showing great bravery in rescuing his masters and their friends from many perils. A skilled starship mechanic and fighter pilot\'s assistant, he has an unlikely but enduring friendship with the fussy protocol droid C-3PO.', 'true', 'true', 'true', 'r2d2Thumbernail.webp', 'r2d2Img1.webp', 'r2d2Img2.webp'),
(49, 'snow troopers', 'Galactic Empire', 'Snowtroopers are stormtroopers trained for operations in arctic conditions and equipped with specialized gear to protect them against cold. When deployed, snowtroopers wear breath heaters and protective hoods, insulated suits and belt capes, rugged boots, heating units and survival backpacks. During the Battle of Hoth, snowtroopers under General Veers’ command were deployed from AT-AT Walkers and quickly and ruthlessly took control of Echo Base.', 'false', 'true', 'false', 'snowtrooperThumbernail.webp', 'snowtrooperImg1.webp', 'snowtrooperImg2.webp'),
(50, ' storm troopers', 'Galactic Empire', 'Stormtroopers are elite shock troops fanatically loyal to the Empire and impossible to sway from the Imperial cause. They wear imposing white armor, which offers a wide range of survival equipment and temperature controls to allow the soldiers to survive in almost any environment. Stormtroopers wield blaster rifles and pistols with great skill, and attack in hordes to overwhelm their enemies. Along with standard stormtroopers, the Empire has organized several specialized units, including snowtroopers and scout troopers.', 'true', 'true', 'true', 'stormtrooperThumbernail.webp', 'stormtrooperImg1.webp', 'stormtrooperImg2.webp'),
(51, 'imperial pilots', 'Galactic Empire', 'Imperial pilots relied on lightning-quick reflexes and fearlessness to survive tours of duty against the Empire\'s enemies, as TIE fighters were lightly armored and lacked shields. Only the very best pilots earned their wings as fighter aces.', 'true', 'true', 'true', 'TIE-pilotThumbernail.webp', 'TIE-pilotImg1.webp', 'TIE-pilotImg2..webp'),
(52, ' scout troopers', 'Galactic Empire', 'Scout troopers were lightly armored compared with other stormtroopers, which allowed them to move more quickly and easily in a range of environments. They were also trained for more independence and adaptability than most Imperial troops. The Empire used scout troopers for a range of missions, including reconnaissance and infiltration. On Endor, scout troopers riding speeder bikes patrolled the forests, guarding against threats to the shield generator protecting the second Death Star during its construction in orbit above the moon.', 'false', 'false', 'true', 'scoutTrooperThumbernail.webp', 'scoutTrooperImg1.webp', 'scoutTrooperImg2.webp'),
(53, 'boba fett', 'Galactic Empire', 'With his customized Mandalorian armor, deadly weaponry, Boba Fett was once regarded as one of the most fearsome and capable bounty hunters in the galaxy. An unaltered genetic clone of his father, bounty hunter Jango Fett, Boba learned combat and martial skills from a young age. Over the course of his career, which included contracts for the Empire and the criminal underworld, he became a legend. Although Fett seemingly met his demise in the Sarlacc pit on Tatooine after falling into the Great Pit of Carkoon, Boba survived the beast and lived to reclaim his armor, taking over the throne at Jabba\'s Palace.', 'false', 'true', 'true', 'boba-fettThumbernail.webp', 'boba-fettImg1.webp', 'boba-fettImg2.webp'),
(54, 'master yoda', 'Rebel Alliance', 'Yoda was a legendary Jedi Master and stronger than most in his connection with the Force. Small in size but wise and powerful, he trained Jedi for over 800 years, playing integral roles in the Clone Wars, the instruction of Luke Skywalker, and unlocking the path to immortality.', 'false', 'true', 'true', 'yodaThumbernail.webp', 'yodaImg1.webp', 'yodaImg2.webp'),
(55, 'ewok', 'Rebel Alliance', 'The Ewoks are sentient furred bipeds native to the moon of Endor. They are curious individuals that stand about one meter tall. They are extremely skilled in forest survival and the construction of primitive technology like gliders and catapults. They are quick learners when exposed to advanced technology, however. The Ewoks accepted members of the Rebel Alliance into their tribe, and allied themselves to their cause. The Ewoks helped in the ground battle to destroy the Imperial shield generator built in their forests, and their primitive weapons felled the stormtroopers and the scout walkers of the Empire. Their help paved the way to victory at the Battle of Endor.', 'false', 'false', 'true', 'Ewok Thumbernail.webp', 'Ewok Img1.webp', 'Ewok Img2.webp'),
(56, 'tusken raiders', 'none', 'Tusken Raiders, or Sand People as they are sometimes known, wear abundant clothing to protect themselves from Tatooine’s twin suns. The strong beings pursue a nomadic existence in some of Tatooine’s most desolate regions. They fear little, and make sudden raids on local settlers.', 'true', 'false', 'false', 'Tusken Thumbnail.webp', 'Tusken Img1.webp', 'Tusken Img2.webp');

-- --------------------------------------------------------

--
-- Table structure for table `jedis`
--

CREATE TABLE `jedis` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `lightsaber` varchar(200) NOT NULL,
  `bio` varchar(1000) NOT NULL,
  `episodeiv` text NOT NULL,
  `episodev` text NOT NULL,
  `episodevi` text NOT NULL,
  `thumbernail` text NOT NULL,
  `imageone` text NOT NULL,
  `imagetwo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jedis`
--

INSERT INTO `jedis` (`id`, `name`, `lightsaber`, `bio`, `episodeiv`, `episodev`, `episodevi`, `thumbernail`, `imageone`, `imagetwo`) VALUES
(8, 'luke skywalker', 'green', 'The son of Jedi Knight Anakin Skywalker and Senator Padmé Amidala, Luke Skywalker was born along with his twin sister, Leia, in 19 BBY. As a result of Amidala\'s death and Anakin\'s fall to the dark side of the Force, the Skywalker children were separated and sent into hiding, with Leia adopted by the royal family of Alderaan while Luke was raised by his relatives on Tatooine. Longing for a life of adventure and purpose, Skywalker joined the Rebellion and began learning the ways of the Force under the guidance of Jedi Master Obi-Wan Kenobi, whose first apprentice was Luke\'s own father. During the Battle of Yavin in 0 BBY, Skywalker saved the Alliance from annihilation by destroying the Empire\'s planet-killing superweapon, the Death Star. He continued his training in the years that followed, determined to become a Jedi Knight like his father before him, and found a new mentor in Grand Master Yoda.', 'true', 'true', 'true', 'Luke Skywalker Thumbernail.webp', 'Luke Skywalker Img1.webp', 'Luke Skywalker Img2.webp'),
(9, 'obi-wan kenobi', 'blue', 'Obi-Wan Kenobi was a legendary Jedi Master who served on the Jedi High Council during the final years of the Republic Era. Kenobi left exile to rescue Leia Organa, Luke\'s twin sister, and was pursued by the Empire\'s Inquisitorius and Vader himself. Later, Kenobi was hunted down once again by Maul, whom he finally slew to protect the young Luke. Kenobi began the boy\'s Jedi training in 0 BBY, and soon after encountered Vader aboard the first Death Star, where he sacrificed himself to ensure that Luke and his allies escaped from the Sith Lord. In death, Kenobi became one with the Force which allowed him to continue guiding Luke throughout the Galactic Civil War. In 4 ABY, Kenobi reunited with his former student, Anakin Skywalker, who died destroying his Sith Master in order to save his son', 'true', 'true', 'true', 'Obi-Wan-KenobiThumbernail.webp', 'Obi-Wan-Kenobi Img1.webp', 'Obi-Wan-Kenobi Img2.webp'),
(10, 'master yoda', 'green', 'Yoda was a legendary Jedi Master who led the Jedi Order through the time of the High Republic, in the years leading up to its destruction by the Sith, and during the transformation of the Galactic Republic into the Galactic Empire. Small in stature but revered for his wisdom and power, Yoda trained generations of Jedi, ultimately serving as the Jedi Order\'s Grand Master. He played integral roles in defending the Republic during the Clone Wars, survived Order 66, and lived to passed on the Jedi tradition to Luke Skywalker, and unlocking the path to immortality.', 'false', 'true', 'true', 'Master Yoda Thumbernail.webp', 'Master Yoda Img1.webp', 'Master Yoda Img2.webp');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `intro` text NOT NULL,
  `sypnosis` text NOT NULL,
  `posterimage` text NOT NULL,
  `background` text NOT NULL,
  `imageone` text NOT NULL,
  `imagetwo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `intro`, `sypnosis`, `posterimage`, `background`, `imageone`, `imagetwo`) VALUES
(4, 'Episode IV', 'a long time ago in a galaxy far, far away....', 'Amid a galactic civil war, Rebel Alliance spies have stolen plans to the Death Star, a colossal space station built by the Galactic Empire that is capable of destroying entire planets. Princess Leia Organa of Alderaan, secretly a Rebel leader, has obtained the schematics, but her ship is intercepted and boarded by Imperial forces under the command of Darth Vader. Leia is taken prisoner, but the droids R2-D2 and C-3PO escape with the plans, crashing on the nearby planet of Tatooine. Darth Vader learns of this and orders the Imperials to pursue the droids.', 'Poster Episode IV .webp', 'Episode IV Background.webp', 'Episode IV Small.webp', 'Episode IV Medium.webp'),
(5, 'Episode V', 'the battle continues', 'Three years after the destruction of the Death Star, the Imperial fleet, led by Darth Vader, dispatches probe droids across the galaxy in search of the Rebel Alliance. One probe locates the rebel base on the ice planet Hoth. While Luke Skywalker is scouting near the base, a wampa captures him before he can investigate a meteorite, but he escapes by using the Force to retrieve his lightsaber and wound the beast. Before Luke succumbs to hypothermia, the Force spirit of his deceased mentor, Obi-Wan Kenobi, instructs him to go to the swamp planet Dagobah to train as a Jedi Knight under the Jedi Master Yoda. Han Solo discovers Luke and insulates him against the weather inside his deceased tauntaun mount until they are rescued the next morning.', 'Poster Episode V .webp', 'Episode V Background.webp', 'Episode V Small .webp', 'Episode V Medium.webp'),
(6, 'Episode VI', 'the empire falls....', 'A year after Han Solo\'s capture and imprisonment in carbonite, C-3PO and R2-D2 enter the palace of the crime lord Jabba the Hutt on Tatooine. They were sent as a goodwill gift by Luke Skywalker, who hopes to negotiate with Jabba for Han\'s release. Disguised as a bounty hunter, Princess Leia infiltrates the palace under the pretense of having captured Chewbacca. She releases Han from the carbonite but is caught by Jabba and enslaved. Luke arrives to bargain for the release of his friends, but Jabba drops him through a trapdoor to be eaten by a rancor. After Luke kills the beast, Jabba decrees that he, Han, and Chewbacca will be fed to a Sarlacc, a deadly ground-dwelling creature. Luke retrieves his new lightsaber from R2-D2, and the group of friends battle Jabba\'s thugs aboard his sail barge. During the chaos, Boba Fett falls into the Sarlacc\'s pit and Leia strangles Jabba to death with her chains. The group escapes as Jabba\'s sail barge is destroyed.', 'Poster Episode VI .webp', 'Episode VI Background.webp', 'Episode VI Small .webp', 'Episode VI Medium.webp');

-- --------------------------------------------------------

--
-- Table structure for table `planets`
--

CREATE TABLE `planets` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `bio` varchar(1000) NOT NULL,
  `episodeiv` text NOT NULL,
  `episodev` text NOT NULL,
  `episodevi` text NOT NULL,
  `thumbernail` text NOT NULL,
  `imageone` text NOT NULL,
  `imagetwo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `planets`
--

INSERT INTO `planets` (`id`, `name`, `bio`, `episodeiv`, `episodev`, `episodevi`, `thumbernail`, `imageone`, `imagetwo`) VALUES
(8, 'alderaan', 'If ever one needed an example of the irredeemable evil of the Empire, look no further than the shattered remains of Alderaan. A peaceful world of lush valleys and snow-capped mountains, Alderaan was once regarded for its natural beauty, its tranquility, and the sophistication of its arts and culture. Before the Imperial uprising, Alderaan was represented in the waning days of the Republic by such venerated politicians as Bail Organa. In fact, Alderaan was one of the earliest supporters of the Alliance to Restore the Republic, though its officials prudently kept all ties to the Rebellion secret. Despite such discretion, the Empire knew it to be a haven of rebel activity, making it a target of reprisal as soon as the Death Star was operational.', 'true', 'false', 'false', 'Alderaan Thumbernail.webp', 'Alderaan Img1.webp', 'Alderaan Img2.webp'),
(9, 'bespin', 'Secluded from galactic turmoil by its location in a little-visited sector of space, Bespin is an astrophysical rarity. An immense gas giant surrounded by a number of moons, the planet contains a band of habitable atmosphere among its endless clouds. In this stratum of life, enterprising prospectors have established floating mining complexes devoted to extracting valuable gasses from deep within the planet. The most well known of these ventures is the opulent Cloud City, formerly under the administration of Lando Calrissian. During the tail end of the Galactic Civil War, the Empire garrisoned Bespin and took over Cloud City, though the outpost and the planet enjoyed freedom after the defeat of the Emperor at the Battle of Endor.', 'false', 'true', 'false', 'Bespin Thumbernail.webp', 'Bespin Img1.webp', 'Bespin Img2.webp'),
(10, 'dagobah', 'Home to Yoda during his final years, Dagobah was a swamp-covered planet strong with the Force -- a forgotten world where the wizened Jedi Master could escape the notice of Imperial forces. Characterized by its bog-like conditions and fetid wetlands, the murky and humid quagmire was undeveloped, with no signs of technology. Though it lacked civilization, the planet was teeming with life -- from its dense, jungle undergrowth to its diverse animal population. Home to a number of fairly common reptilian and amphibious creatures, Dagobah also boasted an indigenous population of much more massive -- and mysterious -- lifeforms. Surrounded by creatures generating the living Force, Yoda learned to connect with the deeper cosmic Force and waited for one who might bring about the return of the Jedi Order.', 'false', 'true', 'true', 'Dagobah Thumbernail.webp', 'Dagobah Img1.webp', 'Dagobah Img2.webp'),
(11, 'endor', 'Secluded in a remote corner of the galaxy, the forest moon of Endor would easily have been overlooked by history were it not for the decisive battle that occurred there. The lush, forest home of the Ewok species is the gravesite of Darth Vader and the Empire itself. It was here that the Rebel Alliance won its most crucial victory over the Galactic Empire.', 'false', 'false', 'true', 'Endor Thumbernail.webp', 'Endor Img1.webp', 'Endor Img2.webp'),
(12, 'hoth', 'Hoth is the sixth planet in the remote system of the same name, and was the site of the Rebel Alliance\'s Echo Base. It is a world of snow and ice, surrounded by numerous moons, and home to deadly creatures like the wampa.', 'false', 'true', 'false', 'Hoth Thumbernail.webp', 'Hoth Img1.webp', 'Hoth Img2.webp'),
(13, 'tatooine', 'Tatooine is harsh desert world orbiting twin suns in the galaxy’s Outer Rim. In the days of the Empire and the Republic, many settlers scratched out a living on moisture farms, while spaceport cities such as Mos Eisley and Mos Espa served as home base for smugglers, criminals, and other rogues. Anakin Skywalker and Luke Skywalker both once called Tatooine home, although across the stars it was more widely known as a hive of scum and villainy ruled by the crime boss Jabba the Hutt.', 'true', 'false', 'true', 'Tatooine Thumbernail.webp', 'Tatooine Img1.webp', 'Tatooine Img2.webp'),
(14, 'yavin 4', 'One of a number of moons orbiting the gas giant Yavin in the galaxy’s Outer Rim, Yavin 4 is a steamy world covered in jungle and forest. It was the location of the principal rebel base early in the Galactic Civil War, and the site from which the Rebellion launched the attack that destroyed the first Death Star -- a confrontation known thereafter as the Battle of Yavin.', 'true', 'false', 'false', 'Yavin IV Thumbernail.webp', 'Yavin IV Img1.webp', 'Yavin IV Img2.webp');

-- --------------------------------------------------------

--
-- Table structure for table `ships`
--

CREATE TABLE `ships` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `affiliation` text NOT NULL,
  `bio` varchar(1000) NOT NULL,
  `episodeiv` text NOT NULL,
  `episodev` text NOT NULL,
  `episodevi` text NOT NULL,
  `thumbernail` text NOT NULL,
  `imageone` text NOT NULL,
  `imagetwo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ships`
--

INSERT INTO `ships` (`id`, `name`, `affiliation`, `bio`, `episodeiv`, `episodev`, `episodevi`, `thumbernail`, `imageone`, `imagetwo`) VALUES
(10, ' Death Star', 'Galactic Empire', 'The Death Star was the Empire’s ultimate weapon: a moon-sized space station with the ability to destroy an entire planet. But the Emperor and Imperial officers like Grand Moff Tarkin underestimated the tenacity of the Rebel Alliance, who refused to bow to this technological terror…', 'true', 'false', 'false', 'Death Star Thumbernail.webp', 'Death Star Img1.webp', 'Death Star Img2.webp'),
(11, ' Death Star II', 'Galactic Empire', 'Hoping to crush the Rebellion once and for all, the Empire began construction of a second dreaded Death Star near Endor. Emperor Palpatine then leaked word of its construction to the Alliance, hoping to lure rebel forces in and destroy them. The Emperor died at the hands of Darth Vader and the Alliance destroyed the second Death Star, striking a momentous blow for freedom. Decades later, the wreckage of the battle station turned out to hold a perilous secret….', 'false', 'false', 'true', 'Death Star II Thumbernail .webp', 'Death Star II Img1.webp', 'Death Star II Img2.webp'),
(12, ' Executor', 'Galactic Empire', 'The mighty flagship of Darth Vader, the Executor led Death Squadron during the Empire’s assault on Hoth and pursued the Millennium Falcon to Bespin, where Luke Skywalker and his friends narrowly escaped her tractor beams. First commanded by Admiral Ozzel and later by Admiral Piett, the massive warship met her end during the Battle of Endor, when a rebel A-wing smashed through her command bridge. Out of control, the Executor careened into the Death Star and exploded.', 'false', 'true', 'true', 'executor Thumbernail.webp', 'executor Img1.webp', 'executor Img2.webp'),
(13, 'Imperial Shuttle', 'Galactic Empire', 'An elegant example that stands apart from typical brutish Imperial engineering, the Lambda-class shuttle is a multi-purpose transport used in the Imperial starfleet. The Empire pressed the shuttle into service for both cargo ferrying and passenger duty. Even the Empire\'s elite, like Darth Vader and the Emperor Palpatine used these shuttles. It has three wings: a stationary center foil and two articulated flanking wings. When in flight, the side wings fold out for greater stabilization. When landing, the wings fold in, shrinking the vessel\'s silhouette.The well-armed vessel has two forward-facing double laser cannons, two wing-mounted double cannons, and a rear-facing double laser cannon. It is equipped with a hyperdrive.', 'false', 'true', 'true', 'imperial Shuttle Thumbernail.webp', 'imperial shuttle Img1.webp', 'imperial shuttle Img2.webp'),
(14, 'Millennium Falcon', 'Rebel Alliance', 'An extensively modified Corellian light freighter, the Millennium Falcon is a legend in smuggler circles and is coveted by many for being the fastest hunk of junk in the galaxy. Despite her humble origins and shabby exterior, the ship that made the Kessel Run in less than 12 parsecs has played a role in some of the greatest victories of the Rebel Alliance and the New Republic. The Falcon looks like a worn-out junker, but beneath her hull she’s full of surprises. A succession of owners, including Lando Calrissian and Han Solo, have made special modifications that boosted the freighter’s speed, shielding and firepower to impressive – and downright illegal – levels. The price of such tinkering? The Falcon can be unpredictable, with her hyperdrive particularly balky. Despite her flaws, she’s beloved by her owners – Han Solo and Chewbacca spent years searching the galaxy for the ship they once called home, rejoicing when they finally reclaimed her.', 'true', 'true', 'true', 'millenium Thumbernail.webp', 'millenium Img1.webp', 'millenium Img2.webp'),
(15, 'Nebulon-B Frigate', 'Rebel Alliance', 'These versatile rebel cruisers were often used to escort rebel convoys, protecting ships from Imperial patrols with an array of powerful turbolasers and tractor beams. After his confrontation with Darth Vader on Cloud City, Luke Skywalker recovered from his injuries aboard a Nebulon-B medical frigate. These escort ships were part of the rebel armada that assaulted the second Death Star at Endor.', 'false', 'true', 'true', 'nebulonB Thumbernail.webp', 'nebulon-B Img1.webp', 'millenium Img2.webp'),
(16, 'Snowspeeder', 'Rebel Alliance', 'When stationed on Hoth, the Rebel Alliance modified T-47 airspeeders to become snowspeeders, fast flying conveyances for patrol and defense of their hidden base. It took some doing to keep the crippling cold from permanently grounding their airforce, but Rebel ingenuity overcame the relentless Hoth elements. The T-47 airspeeder is a small, wedge-shaped craft with two forward-facing laser cannons. In its rear arc is a harpoon gun fitted with a heavy-duty tow cable. The snowspeeder is a two-man vessel, with a pilot and rear-facing tailgunner.', 'false', 'true', 'false', 'snowspeeder Thumbernail.webp', 'snowspeeder Img1.webp', 'snowspeeder Img2.webp'),
(17, 'Imperial  Destroyer', 'Galactic Empire', 'The wedge-shaped Imperial Star Destroyer is a capital ship bristling with weapons emplacements. Turbolasers and tractor beam projectors dot its surface. Its belly hangar bay can launch TIE fighters, boarding craft, land assault units, hyperspace probes, or be used to hold captured craft. In the days of the Empire, its bustling bridge would be staffed by the finest crewers in the Imperial starfleet. Its presence in a system mark matters of extreme Imperial import. Though, as is typical of the Empire, not even the Star Destroyer was enough to sate the Imperial hunger for displays of power. Larger vessels, such as the Super Star Destroyer, dwarf even these giants.', 'true', 'true', 'true', 'Imperial Destroyer  Thumbernail.webp', 'Imperial Destroyer Img1.webp', 'Imperial Destroyer Img2.webp'),
(18, 'TIE Bomber', 'Galactic Empire', 'The Empire uses flights of its specialized double-hulled TIE bombers to drop vast quantities of munitions on rebellious planets and targets in space, delivering devastating attacks with frightening accuracy.', 'false', 'true', 'true', 'TIE Bomber Thumbernail.webp', 'TIE Bomber Img1.webp', 'TIE Bomber Img2.webp'),
(19, 'TIE Fighter', 'Galactic Empire', 'The TIE fighter was the unforgettable symbol of the Imperial fleet. Carried aboard Star Destroyers and battle stations, TIE fighters were single-pilot vehicles designed for fast-paced dogfights with Rebel X-wings and other starfighters. The iconic TIE fighter led to other models in the TIE family including the dagger-shaped TIE Interceptor and the explosive-laden TIE bomber. The terrifying roar of a TIE\'s engines would strike fear into the hearts of all enemies of the Empire.', 'true', 'true', 'true', 'TIE fighter Thumbernail.webp', 'TIE fighter Img1.webp', 'TIE fighter Img2.webp'),
(20, 'Vader\'s TIE Fighter', 'Galactic Empire', 'Darth Vader piloted this distinctive experimental TIE fighter above the first Death Star, using its blaster cannons and his uncanny abilities with the Force to blast Rebel starfighters into glittering fragments.', 'true', 'false', 'false', 'vaders TIE  Thumbernail.webp', 'vaders TIE img1.webp', 'vaders TIE  Img2.webp'),
(21, ' X-wing ', 'Rebel Alliance', 'The X-wing is a versatile Rebel Alliance starfighter that balances speed with firepower. Armed with four laser cannons and two proton torpedo launchers, the X-wing can take on anything the Empire throws at it. Nimble engines give the X-wing an edge during dogfights, and it can make long-range jumps with its hyperdrive and its astromech droid co-pilot. Luke Skywalker is famous for destroying the Death Star behind the controls of an X-wing.', 'true', 'true', 'true', 'x-wing Thumbernail.webp', 'x-wing Img1.webp', 'x-wing Img2.webp'),
(22, ' Y-wing', 'Rebel Alliance', 'The Y-wing is a workhorse starfighter has been in use since the Clone Wars. Used for dogfights and for bombing runs against capital ships and ground targets, Y-wings are often overshadowed by newer models such as the X-wing and the A-wing. But the Y-wing\'s historical importance is remarkable, and it has reliably served multiple generations of star pilots.', 'true', 'true', 'true', 'y-wing Thumbernail.webp', 'y-wing Img1.webp', 'y-wing Img2.webp');

-- --------------------------------------------------------

--
-- Table structure for table `siths`
--

CREATE TABLE `siths` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `bio` varchar(1000) NOT NULL,
  `episodeiv` text NOT NULL,
  `episodev` text NOT NULL,
  `episodevi` text NOT NULL,
  `thumbernail` text NOT NULL,
  `imageone` text NOT NULL,
  `imagetwo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siths`
--

INSERT INTO `siths` (`id`, `name`, `bio`, `episodeiv`, `episodev`, `episodevi`, `thumbernail`, `imageone`, `imagetwo`) VALUES
(6, 'darth vader', 'Anakin Skywalker was a legendary Jedi Knight of the Galactic Republic and the prophesied Chosen One of the Jedi Order, destined to bring balance to the Force.  His alter ego, Darth Vader, the Dark Lord of the Sith, was created when Skywalker turned to the dark side of the Force, pledging his allegiance to the Sith Lord Darth Sidious at the end of the Republic Era.', 'true', 'true', 'true', 'darth-vaderThumbernail.webp', 'darth-vaderImg1.webp', 'darth-vaderImg2.webp'),
(7, 'the emperor', 'Darth Sidious, born Sheev Palpatine and also simply known as The Emperor, was a male human Dark Lord of the Sith and Emperor of the Galactic Empire, with his reign lasting from 19 BBY to 4 ABY. Rising to power in the Galactic Senate as the senator of Naboo, the secretive Sith Lord cultivated two identities, Sidious and Palpatine, using both to further his political career and deceive his way into accomplishing his goal. He orchestrated the fall of the Galactic Republic and the Jedi Order through the Clone Wars, and then established his reign over the galaxy which lasted until his death at the Battle of Endor.', 'false', 'true', 'true', 'emperor palpatineThumbernail.webp', 'emperor palpatineImg1.webp', 'emperor palpatineImg2.webp');

-- --------------------------------------------------------

--
-- Table structure for table `theforce`
--

CREATE TABLE `theforce` (
  `id` int(11) NOT NULL,
  `about` varchar(1500) NOT NULL,
  `imageone` text,
  `imagetwo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theforce`
--

INSERT INTO `theforce` (`id`, `about`, `imageone`, `imagetwo`) VALUES
(1, 'The Force is a mysterious energy field created by life that binds the galaxy together. Harnessing the power of the Force gives the Jedi, the Sith, and others sensitive to this spiritual energy extraordinary abilities, such as levitating objects, tricking minds, and seeing things before they happen. While the Force can grant users powerful abilities, it also directs their actions. And it has a will of its own, which both scholars and mystics have spent millennia seeking to understand.\r\n<br><br>\r\nThe Force as a recorded concept existed for well over twenty-five thousand years. There were two overarching and symbiotic aspects of the Force. The Living Force was the energy of all life, which, in turn, fed into the Cosmic Force which bound everything together and communicated the will of the Force through the midi-chlorians. The Jedi followed a code of selflessness and service to others; therefore, they adhered to the light side of the Force, one of two methods of using the all-encompassing energy field. The Jedi\'s adversaries, the Sith, coveted strength and power through the dark side of the Force. Their opposing philosophies led to millennia of cyclical conflict between the two orders, which resulted in both the extinction of the Sith and the near annihilation of the Jedi.', 'The Force Img1.webp', 'The Force Img2.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alienraces`
--
ALTER TABLE `alienraces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jedis`
--
ALTER TABLE `jedis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planets`
--
ALTER TABLE `planets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ships`
--
ALTER TABLE `ships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siths`
--
ALTER TABLE `siths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theforce`
--
ALTER TABLE `theforce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alienraces`
--
ALTER TABLE `alienraces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `jedis`
--
ALTER TABLE `jedis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `planets`
--
ALTER TABLE `planets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ships`
--
ALTER TABLE `ships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `siths`
--
ALTER TABLE `siths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `theforce`
--
ALTER TABLE `theforce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
