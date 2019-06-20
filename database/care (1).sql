-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2019 at 07:46 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `care`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_log`
--

CREATE TABLE `daily_log` (
  `symptom_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `log_date` date NOT NULL,
  `sleep` varchar(5) NOT NULL,
  `sleep_issue` varchar(50) NOT NULL,
  `physical` varchar(5) NOT NULL,
  `activity` varchar(40) NOT NULL,
  `stress` int(2) NOT NULL,
  `stresstrig` varchar(50) NOT NULL,
  `anxiety` int(2) NOT NULL,
  `anxietytrig` varchar(50) NOT NULL,
  `depression` int(2) NOT NULL,
  `depressiontrig` varchar(50) NOT NULL,
  `mania` int(2) NOT NULL,
  `maniatrig` varchar(50) NOT NULL,
  `anger` int(2) NOT NULL,
  `angertrig` varchar(50) NOT NULL,
  `weight` int(3) NOT NULL,
  `note` text NOT NULL,
  `score` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `interest_id` int(11) NOT NULL,
  `interest` int(1) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`interest_id`, `interest`, `title`, `description`, `image`) VALUES
(1, 2, 'Just Say No', 'Do you have a hard time saying \"no?\" \r\nSetting boundaries between work and \r\nhome helps to balance your daily \r\nactivities. \r\n\r\nThere are only so many hours in the day. \r\nDon\'t be afraid to say \"no\" when someone \r\nasks for your time that\'s outside of your \r\nlimits. ', 'hand'),
(2, 2, 'Float Away', 'Could floating in water be the answer to \r\nyour stress? Some benefits of flotation therapy include relaxation, a decrease in pain, and lower anxiety levels. Not to mention, it helps to clear your mind. \r\n\r\nYou can also try a hot shower. Both approaches work well to relieve stress \r\nand soothe your body. ', 'float'),
(3, 2, 'What\'s Truly  Important? ', '\"When you find yourself stressed, ask yourself one question: Will this matter in 5 years from now? if yes, then do \r\nsomething about the situation. If no, then let it go.\" Catherine Pulsifer(author)\r\n\r\nFocus your energy on the things that matter. Make a list of your worries and \r\nprioritize them. Cross off any that seem \r\ntrivial.', 'stress'),
(4, 2, 'Go Acoustic ', 'When you\'re constantly \"on\" 24/7, your brain can suffer from stress. This makes \r\nit hard to focus.\r\n\r\nRemember to unplug and turn off the \r\nnotifications on your phone. Then you can concentrate at work or give undivided attention to family and friends. You may even get some \"me time\" without interruptions. ', 'family'),
(5, 2, 'Stay in Control', 'Stress triggers are all around us. When \r\nyou encounter one, the emotional part of your brain takes over. This makes it hard to solve problems and think straight. \r\n\r\nTo stay calm during a stressful event, \r\nhave a go-to relaxation method. Breathe deeply, distract your mind, or close your eyes. ', 'stress2'),
(6, 5, 'Celebrate Without  Food ', 'Not every major milestone needs to be marked with a celebratory feast. If you \r\nwant to celebrate a birthday, promotion, or engagement, try treating yourself another way. Take a day trip to a local tourist site, or head to the beach for a few hours. \r\n\r\nYou\'ll save calories while also making memories with friends or family. \r\n', ''),
(7, 5, 'Self-Love ', 'A lot of stress comes from being too hard on yourself. You don\'t meet your own high expectations or you\'re an expert at self-criticism. \r\n\r\nRemember to be forgiving and kind to yourself. This self-compassion helps you\r\nbuild resiliency and spread compassion to others.', ''),
(8, 3, 'Full Embrace', '\"When we show up fully, with awareness and acceptance, even the worst demons usually back down.\' \r\n-Susan David, Ph.D., award-winning psychologist and author \r\n\r\nWe tend to worry about the things that scare us. In order to be successful, you have to be willing to face those fears.', 'power'),
(9, 5, 'Mindful Eating ', 'It\'s easy to finish off a bag of chips while binge-watching your favorite TV show To help you keep a healthy weight, consider practicing mindfulness.\r\n\r\nWith mindful munching, you eat when you\'re hungry. Acknowledge each bite. And stop when you\'re full.', ''),
(10, 2, 'Too Much Stress ', 'Stress can be helpful in small doses. Your fight or flight response is what keeps you safe. But too much stress can affect your health. Stress hormones can increase blood pressure and heart rate. \r\n\r\nFind ways to lower stress, like exercising or using a creative outlet your health depends on it. ', 'stress'),
(11, 3, 'Patience on Progress', '\"Don\'t give up because you don\'t see immediate results. Know that each \r\npositive choice you make is affecting you in hidden ways and will add up to big changes over time.\" \r\n\r\n- Karen Salmonsohn, self-help book \r\nauthor Progressive Relaxation ', ''),
(12, 4, 'To relax now', 'Tense and then release each muscle group. Starting with your toes and work your way up from your calves, legs, stomach, hands, arms, shoulders, neck, and face. \r\n\r\nOnce you relax the body, the mind will follow.', ''),
(13, 5, 'Eat Before You Go', 'Socializing can be expensive... to your calorie intake! Most parties and events are synonymous with unhealthy snacks, especially around holidays. \r\n\r\nBefore you head out to a party, eat a healthy snack at home so that you\'re not as hungry when you arrive. Then you can graze on a few treats and focus on the party, rather than eating too many unhealthy hors d\'oeuvres. \r\n', ''),
(14, 4, 'Look for the Open Door', '\"When one door of happiness closes, another opens; but often we look so long at the closed door that we do not see the one which has been opened for us.\"\r\n-Helen Keller \r\n\r\nWhen faced with a crisis. be mindful of your feelings. But don\'t dwell on the negatives. Acknowledge them and move on to better things! \r\n\r\n', ''),
(15, 4, 'Chronic Pain and Stress ', 'Stress not only gets in the way of daily tasks, it can also trigger pain. If you suffer any type of chronic pain, like back pain, stress can make it worse. \r\n\r\nTo reduce stress, practice breathing\r\nexercises. Make sure to pay attention to\r\nthe pace of your breaths. Inhale and \r\nexhale slowly. \r\n', ''),
(16, 4, 'Relax Your Muscles', 'If you\'re looking for a way to de-stress at night, try relaxing your muscles. You can release stress by purposely tensing your muscles. \r\n\r\nIt may sound counter-intuitive. But, \"progressive relaxation\" is a quick and powerful way to reduce stress. ', ''),
(17, 5, 'EATING HEALTHY', 'Apple Appetizer\r\n\r\nMunch on an apple as an appetizer to any meal. Studies show that eating an apple before a meal can reduce your hunger. \r\n\r\nSo enjoy an apple for a nutritional boost and to control your portions. ', ''),
(18, 5, 'Garden Your Body', '\"Our bodies are our gardens, to the which our wills are gardeners.\" -Shakespeare ', ''),
(19, 3, 'Face the Storm', 'If you\'re dealing with a problem that feels unsolvable, try mindfulness. Write down what\'s bothering you. \r\n\r\nTake 15-minutes to clear your head. When the time is up, tackle the problem. Being mindful can help you find a solution and improve your resilience for the next problem. ', ''),
(20, 5, 'Small Victories', 'Don\'t be discouraged if it\'s taking a while to reach your goal weight. \r\n\r\nEven slight weight loss can help boost your overall health: losing 5-10% of your current body weight is enough for positive improvements. And that\'s reason to celebrate! \r\n', ''),
(21, 3, 'How to Wash Greens ', 'Add hearty greens to your diet! They\'re rich in iron, copper, calcium, and other important nutrients. \r\n\r\nRecipe: Wash them by shaking the leaves in a water bath the dirt will fall right to the bottom. Once cleaned, you can braise or saute them in coconut oil with a pinch of salt and a splash of lemon. ', ''),
(22, 3, 'Relaxing Vacation', 'Yes, you can take a vacation for your mind and your body. There are all kinds of getaways designed to improve your mental and physical wellbeing. \r\n\r\nTry a yoga retreat in the mountains or a meditation workshop. You\'ll find yourself calmer and less stressed when you return. ', ''),
(23, 3, 'Self-Esteem', 'Do you need a quick confidence boost? Beat stress and boost your self-esteem by meditating once a day. \r\n\r\nJust take 5 minutes to close your eyes and focus on your thoughts. Don\'t \r\ndismiss them. Allow your thoughts to flow freely, while being aware of your \r\nsurroundings. ', ''),
(24, 3, 'Reduce Worries', '\"When I look back on all these worries, I remember the story of the old man who said on his deathbed that he had had a lot of trouble in his life, most of which had never happened.\"- Winston Churchill, British politician and statesman \r\n\r\nWe tend to create our own stress internally. When you start to worry, take a breath and give your brain a break from the concern.\r\n', ''),
(25, 2, 'Prevention is Best', 'Stress triggers your \"fight or flight\" response. It\'s a built-in survival mechanism to help you face a threat or run away. \r\n\r\nWhen you feel stress, try some simple breathing exercises. Even better\r\npractice breathing exercises regularly. This can help prevent stress in the first \r\nplace.', 'breath');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(6) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` text NOT NULL,
  `interest` int(11) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `weight`
--

CREATE TABLE `weight` (
  `weight_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `weight` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_log`
--
ALTER TABLE `daily_log`
  ADD PRIMARY KEY (`symptom_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`interest_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `weight`
--
ALTER TABLE `weight`
  ADD PRIMARY KEY (`weight_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daily_log`
--
ALTER TABLE `daily_log`
  MODIFY `symptom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `interest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `weight`
--
ALTER TABLE `weight`
  MODIFY `weight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daily_log`
--
ALTER TABLE `daily_log`
  ADD CONSTRAINT `daily_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `weight`
--
ALTER TABLE `weight`
  ADD CONSTRAINT `weight_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
