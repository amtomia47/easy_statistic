CREATE TABLE `student_data`(
    `student_id` VARCHAR(15) PRIMARY KEY ,
    `play_time` INT ,
    `money_spend` INT ,
    `buy_sequence` VARCHAR(100)
);
CREATE TABLE `a`(   /*table A buy data*/
    `a` INT,
    `b` INT,
    `c` INT,
    `d` INT,
    `e` INT,
    `f` INT,
    `g` INT,
    `h` INT,
    `i` INT
);
CREATE TABLE `b`(   /*table B buy data*/
    `a` FLOAT,
    `b` FLOAT,
    `c` FLOAT,
    `d` FLOAT,
    `e` FLOAT,
    `f` FLOAT,
    `g` FLOAT,
    `h` FLOAT,
    `i` FLOAT,
    `j` FLOAT,
    `k` FLOAT,
    `l` FLOAT,
    `m` FLOAT,
    `n` FLOAT,
    `o` FLOAT
);
CREATE TABLE `c`(   /*table C buy data*/
    `a` FLOAT,
    `b` FLOAT,
    `c` FLOAT,
    `d` FLOAT,
    `e` FLOAT,
    `f` FLOAT,
    `g` FLOAT,
    `h` FLOAT,
    `i` FLOAT
);
CREATE TABLE `d`(   /*table D buy data*/
    `a` FLOAT,
    `b` FLOAT,
    `c` FLOAT,
    `d` FLOAT,
    `e` FLOAT,
    `f` FLOAT,
    `g` FLOAT,
    `h` FLOAT,
    `i` FLOAT
);
INSERT INTO `a`(`a`,`b`,`c`,`d`,`e`,`f`,`g`,`h`,`i`) VALUES(100,600,300,100,200,200,300,700,1000);
INSERT INTO `b`(`a`,`b`,`c`,`d`,`e`,`f`,`g`,`h`,`i`,`j`,`k`,`l`,`m`,`n`,`o`) VALUES(2.68,17.14,8.57,28.57,2.86,5.71,5.71,14.29,8.57,20.00,28.57,57.14,14.29,48.86,42.86);
INSERT INTO `c`(`a`,`b`,`c`,`d`,`e`,`f`,`g`,`h`,`i`) VALUES(10,60,30,20,40,40,15,35,50);
INSERT INTO `d`(`a`,`b`,`c`,`d`,`e`,`f`,`g`,`h`,`i`) VALUES(20,40,20,20,13.33,13.33,60,46.67,66.67);