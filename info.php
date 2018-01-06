
<?php


$options = [
    'cost' => 12,
];
echo password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options)."\n";
echo 'asdfsadf';
echo password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options)."\n";


phpinfo();
/*
smtp;550 5.2.3 RESOLVER.RST.RecipSizeLimit; message too large for this recipient


1. Api to list the top 5 sorted list

2. First item icon change - replay

3. Current item icon change- play

4. Unlock applies

5. 1 to 3

6. 1- (all api), 2,3


1. Api to list all

2. Loop through - add the listened session, 4,5

3. find the last, remove rest from the all list


192.168.1.94



user_cha_id:56726
reminders_day[]:0
reminders_day[]:1
reminders_day[]:2
reminders_day[]:3
reminders_day[]:4
reminders_day[]:5
hrs[]:02
min[]:00
am_pm[]:AM


select * from user_personal_details where sleep_hour is not null

select * from hra_question_answer group by user_id



update corporate SET corp_consent_term='You acknowledge and understand that Zoojoo.be will process your personal data/information including sensitive personal data/information for providing services to you. By clicking on <i>I Agree</i>, you hereby consent to the collection, processing, storage, disclosure of your personal information including sensitive personal data/information to third parties for purposes related to the services.';

UPDATE corporate SET corp_consent_term = REPLACE(corp_consent_term, '<i>I Agree</i>', '<i ><a href="javascript:;" class="tc_privacy_policy" data-corporate_id="{corporate_id}">I Agree</a></i>')

UPDATE corporate SET corp_consent_term=REPLACE('You acknowledge and understand that Zoojoo.be will process your personal data/information including sensitive personal data/information for providing services to you. By clicking on <i>I Agree</i>, you hereby consent to the collection, processing, storage, disclosure of your personal information including sensitive personal data/information to third parties for purposes related to the services.', '<i>I Agree</i>', '<i ><a href="javascript:;" class="tc_privacy_policy" data-corporate_id="{corporate_id}">I Agree</a></i>')
UPDATE corporate SET corp_consent_term = (select REPLACE('You acknowledge and understand that Zoojoo.be will process your personal data/information including sensitive personal data/information for providing services to you. By clicking on <i>I Agree</i>, you hereby consent to the collection, processing, storage, disclosure of your personal information including sensitive personal data/information to third parties for purposes related to the services.', '<i>I Agree</i>', '<i ><a href="javascript:;" class="tc_privacy_policy" data-corporate_id="{corporate_id}">I Agree</a></i>'))*/
?>
