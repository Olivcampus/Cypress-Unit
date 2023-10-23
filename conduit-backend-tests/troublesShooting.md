# Troubleshooting Report
To: Development Team
Dear Team, I'd like to address two failures during the testing stage.


There were 2 failures: 1/ test_getRouteKeyName (UserTest.php:29)  &   2/ test_following (UserTest.php:124)

### _Tests\Unit\UserTest::test_getRouteKeyName_

```
Failed asserting that two strings are equal.
--- Expected
+++ Actual
@@ @@
-'username'
+'user_id'
/home/yans/Desktop/testing/conduit-backend-tests/tests/Unit/UserTest.php:29
/usr/share/php/PHPUnit/TextUI/Command.php:143
/usr/share/php/PHPUnit/TextUI/Command.php:96
```
### _Tests\Unit\UserTest::test_following_

```
Failed asserting that 2 matches expected 1.
/home/yans/Desktop/testing/conduit-backend-tests/tests/Unit/UserTest.php:124
/usr/share/php/PHPUnit/TextUI/Command.php:143
/usr/share/php/PHPUnit/TextUI/Command.php:96
FAILURES!
Tests: 10, Assertions: 36, Failures: 2.
```




## 1/ Bug Fix for Modified getRouteKeyName Method

I'm reporting an issue regarding the recent modification of the getRouteKeyName method in our UserTest (ligne 29).  
```php
public function getRouteKeyName(): string
{
    return 'user_id';
}
```
**When**: A user's profile is accessed using their username in the URL.  
**Then**: The expected behavior is to retrieve the user's profile based on their username from the URL.  
**Issue**: The actual result does not match the expected result after the modification of the getRouteKeyName method.
When trying to access a user's profile by username, an error is thrown, and the user's profile is not retrieved as anticipated.  
Suggestion for Debugging: It appears that the modified getRouteKeyName method is returning 'user_id' as the key name instead of 'username', which is causing the issue.
To resolve this, I recommend reverting the method to its original implementation as shown below:
```php 
  public function getRouteKeyName(): string
   {
        return 'username';
    }
```
  
**Issue:**  
The test_getRouteKeyName is designed to check the behavior of the getRouteKeyName method.
However, after the recent modification, the method returns `user_id` instead of the expected `username`.
**Suggestion for Debugging:**  
To resolve this issue, I recommend reverting the method to its original implementation, which should return `username` as the route key name:

```php 
public function getRouteKeyName(): string
{
    return 'username';
}
```
This will ensure that the route key name is set to 'username' as expected,allowing the user's profile to be accessed correctly via their username in the URL.




## 2/ Troubleshooting Report - Test test_following Failure

The issue lies in the definition of the following method in the User model, which is currently using incorrect foreign keys.   
  
**Given**: A test case test_following is run to check how rose following munonda.  
**When**: In the case where rose following munonda.  
**Then**: The expected result is 1, but the test is returning 2, indicating a problem with the following relationships.  
**Suggestion for Debugging:**  
To correct this issue, please update the following method in the User model to use the correct foreign keys:  

```php
public function following(): BelongsToMany
{
    return $this->belongsToMany(User::class, 'followers', 'follower_id', 'following_id');
}
```
With this correction, the test should produce the expected result of 1, and the following relationships will work as intended.  
  
In conclusion, I kindly request that the development team makes the suggested correction to the following method in the User model to resolve this issue.  
Thank you for your prompt attention. If you have any questions or need further assistance, please reach out.

