CREATE TABLE `tbl_image` (
  `imageId` int(11) NOT NULL,
  `imageType` varchar(255) NOT NULL,
  `imageData` longblob NOT NULL
);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD PRIMARY KEY (`imageId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT;