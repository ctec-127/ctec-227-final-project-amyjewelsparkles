-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2019 at 07:03 PM
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

--
-- Dumping data for table `daily_log`
--

INSERT INTO `daily_log` (`symptom_id`, `user_id`, `log_date`, `sleep`, `physical`, `activity`, `stress`, `stresstrig`, `anxiety`, `anxietytrig`, `depression`, `depressiontrig`, `mania`, `maniatrig`, `anger`, `angertrig`, `weight`, `note`, `score`) VALUES
(21, 24, '2019-06-18', '4', '4', '', 3, '', 2, 'yes', 5, 'no more sushi rice', 5, 'lack of sushi', 5, 'i am fat', 999, 'Im out of sushi', 24),
(31, 9, '2019-06-01', '4', '3', '', 4, 'something', 3, 'cant remember', 3, 'funny', 4, 'cats', 3, 'not sure', 168, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. ', 22),
(32, 9, '2019-06-03', '4', '3', 'gym', 2, 'work', 5, 'dont know', 4, 'not sure', 3, 'coffee', 3, 'shoes', 166, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.', 22),
(33, 9, '2019-06-05', '3', '3', 'walking', 2, 'work', 2, 'work', 2, 'home', 1, '', 2, 'boss', 163, 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 15),
(34, 9, '2019-06-06', '4', '3', 'hiking', 4, 'shopping', 4, 'clothes', 3, 'i am fat', 2, 'coffee', 1, '', 163, 'Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.', 19),
(35, 9, '2019-06-08', '4', '3', 'shopping', 3, 'money', 3, 'job', 2, 'work', 1, '', 5, 'boss very rude', 163, 'Praesent dapibus, neque id cursus faucibus, tortor neque egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.', 19),
(36, 9, '2019-06-09', '5', '5', 'running', 1, 'no work', 1, 'no school', 1, '', 1, '', 1, '', 163, 'Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.', 7),
(37, 9, '2019-06-11', '2', '2', 'cooking', 3, 'work', 5, 'i dont know', 3, 'missing mom', 4, 'coffee maybe', 5, 'car broke', 165, 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 26),
(38, 9, '2019-06-12', '1', '1', 'nothing', 5, 'work', 4, 'yes', 5, 'missing mom', 3, 'too much coffee', 5, 'i am fat', 167, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.', 32);

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
(6, 5, 'Celebrate Without  Food ', 'Not every major milestone needs to be marked with a celebratory feast. If you \r\nwant to celebrate a birthday, promotion, or engagement, try treating yourself another way. Take a day trip to a local tourist site, or head to the beach for a few hours. \r\n\r\nYou\'ll save calories while also making memories with friends or family. \r\n', 'food'),
(7, 5, 'Self-Love ', 'A lot of stress comes from being too hard on yourself. You don\'t meet your own high expectations or you\'re an expert at self-criticism. \r\n\r\nRemember to be forgiving and kind to yourself. This self-compassion helps you\r\nbuild resiliency and spread compassion to others.', 'love'),
(8, 3, 'Full Embrace', '\"When we show up fully, with awareness and acceptance, even the worst demons usually back down.\' \r\n-Susan David, Ph.D., award-winning psychologist and author \r\n\r\nWe tend to worry about the things that scare us. In order to be successful, you have to be willing to face those fears.', 'power'),
(9, 5, 'Mindful Eating ', 'It\'s easy to finish off a bag of chips while binge-watching your favorite TV show To help you keep a healthy weight, consider practicing mindfulness.\r\n\r\nWith mindful munching, you eat when you\'re hungry. Acknowledge each bite. And stop when you\'re full.', 'food'),
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

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `interest`, `date_joined`, `date_registered`) VALUES
(1, 'test1', 'test1', 'test1@test.com', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff', 0, '2019-06-11 22:58:15', '0000-00-00'),
(2, '', '', 'test1@test.com', 'd326145a0b6f66746ceafa5a3023540194eed1d87d25a56a2348b81995dc735e69e77c052e39442129f8c09fd29598b78b93a41ce03c240706a9cf6dd5513124', 0, '2019-06-11 22:58:15', '0000-00-00'),
(3, '', '', 'test1@test.com', 'd326145a0b6f66746ceafa5a3023540194eed1d87d25a56a2348b81995dc735e69e77c052e39442129f8c09fd29598b78b93a41ce03c240706a9cf6dd5513124', 0, '2019-06-11 22:58:15', '0000-00-00'),
(4, '', '', 'test1@test.com', 'd326145a0b6f66746ceafa5a3023540194eed1d87d25a56a2348b81995dc735e69e77c052e39442129f8c09fd29598b78b93a41ce03c240706a9cf6dd5513124', 0, '2019-06-11 22:58:15', '0000-00-00'),
(5, '', '', 'test1@test.com', 'd326145a0b6f66746ceafa5a3023540194eed1d87d25a56a2348b81995dc735e69e77c052e39442129f8c09fd29598b78b93a41ce03c240706a9cf6dd5513124', 0, '2019-06-11 22:58:15', '0000-00-00'),
(6, 'safd', 'dsfa', 'amykhan@gmail.com', '1b86355f13a7f0b90c8b6053c0254399994dfbb3843e08d603e292ca13b8f672ed5e58791c10f3e36daec9699cc2fbdc88b4fe116efa7fce016938b787043818', 0, '2019-06-11 22:58:15', '0000-00-00'),
(7, 'safd', 'dsfa', 'amykhan@gmail.com', '1b86355f13a7f0b90c8b6053c0254399994dfbb3843e08d603e292ca13b8f672ed5e58791c10f3e36daec9699cc2fbdc88b4fe116efa7fce016938b787043818', 0, '2019-06-11 22:58:15', '0000-00-00'),
(8, 'Amina', 'Khan', 'amyykhan@gmail.com', '84c23cc703619245d8f3f39f162b7e1747c4f48fb687ee2c178380dbabcf103e9d61c590558d418e073c972a69dd06741ec26d530020fdafd4085341a09d6ec7', 0, '2019-06-11 22:58:15', '0000-00-00'),
(9, 'Amina', 'khan', 'amina85us@yahoo.com', '02e45e07394e2ffbe3028d8a965aeedcbd1fe6e2bf18f9c2de1a3518c636cab5d048ef4c696d228d5e64995970c248dc50ae9abe1608ac12b32d9bfdde3de307', 2, '2019-06-17 23:49:29', '0000-00-00'),
(10, 'Myra', 'rana', 'myra@gmail.com', '7ed9afe4bfd4331390b69fd9770fb5c9c56ddc44480989d02aca916ef33c00a45224b53a4ab7f5dbbb0897399478e483f80b59e337e2be48bb73504ef967d63a', 0, '2019-06-13 19:40:48', '2019-06-13'),
(11, 'amy', 'k', 'amy@gmail.com', 'a262621d2efd9e78caf6b335bf4a760a21a37dd222cdcbf6dcd8f37c06c3603877dbe73cf751b195d9be7b5c85d2d0f2278f8454f855486dde2894576bfc9f9a', 0, '2019-06-16 16:54:19', '2019-06-16'),
(12, 'jewel', 'sparkles', 'jewel@gmail.com', '65cf028cba3b701b0e7bfd54f46387f74886f1913f72e95b160693b3d6e96839917ad6ae345e1c493a7559ec3e4b769872e191fc82f6dd624fc2baa58f322cec', 0, '2019-06-16 16:55:07', '2019-06-16'),
(13, 'haj', 'haj', 'haj@gmail.com', '254430abb7a52e63d2cd455d1975bf526196ad17bd573aa38386d6b366c16b51358022afc524ec969c091c2b491ea7f6e0da211d3f7f0f98cf90cf6ace61ab7c', 0, '2019-06-16 17:17:39', '2019-06-16'),
(14, '', '', '', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', 2, '2019-06-17 06:46:27', '2019-06-17'),
(15, '', '', '', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', 2, '2019-06-17 06:56:52', '2019-06-17'),
(16, '', '', '', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', 0, '2019-06-17 07:11:47', '2019-06-17'),
(17, '', '', '', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', 0, '2019-06-17 07:12:04', '2019-06-17'),
(18, '', '', '', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', 0, '2019-06-17 08:08:56', '2019-06-17'),
(19, 'jjj', 'kkk', 'amyykhan@gmail.com', '356ace6f7dcc4c6d8fb137924c7ca43c7cd8ec2e4a00ff8a7fd7b2909de4692c92016d46647216357cca28aac2d95cc0b81d55776fb3f8def23162793da2ffe4', 2, '2019-06-17 08:16:59', '2019-06-17'),
(20, 'Amina', 'Khan', 'amina85us@yahoo.com', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', 2, '2019-06-17 09:02:49', '2019-06-17'),
(21, 'Amina', 'Khan', 'amina85us@yahoo.com', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', 2, '2019-06-17 09:03:38', '2019-06-17'),
(22, 'Amina', 'Khan', 'amina85us@yahoo.com', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', 2, '2019-06-17 09:03:48', '2019-06-17'),
(23, 'Amina', 'Khan', 'amina85us@yahoo.com', 'd326145a0b6f66746ceafa5a3023540194eed1d87d25a56a2348b81995dc735e69e77c052e39442129f8c09fd29598b78b93a41ce03c240706a9cf6dd5513124', 2, '2019-06-17 09:06:48', '2019-06-17'),
(24, 'seymore', 'butts ', 'hajira@hajira.com', 'ba6e89a1687ecec9e285334ec603395c179e22640a9a8c57db54fa0ebbb8d8eb56f7ebc16c8961569750ce4b9f5bf0ff90072cc9fcc35f5b19514e3516fc33dd', 5, '2019-06-18 00:05:23', '2019-06-18');

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
-- Dumping data for table `weight`
--

INSERT INTO `weight` (`weight_id`, `user_id`, `weight`) VALUES
(1, 9, 167);

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
  MODIFY `symptom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `interest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
