#CakeMail Technical Test

At CakeMail we believe that hiring a developer, or anyone for that matter, is  a great opportunity, but also a risk. Ensuring a personal fit in the team can be judged from an interview. But to assess if a developer has the necessary skills to work on our projects, we provide a technical test. Although this test is an important part of our hiring process, please be aware that we're not asking you to spend too much time on it. We prefer seeing a small amount of quality code over large amounts of lower quality code. Less is more.


##The test

The test is not of the typical question/answer type. We actually have you write code. Not just snippets of code, but an actual working, albeit small and not so useful, application.

### Requirements
For this test you will be writing a web API in PHP for managing todo lists. It has the following requirements:

1. It needs to provide a way to get, create, modify and delete todo lists.
2. It needs to provide a way to manage todo items in these lists. This includes marking a todo as done, and getting a list of only the ones that haven't been done yet. 
3. In needs to have a simple authentication system. It's up to you to decide how you implement this, but keep it simple. Its only goal is to limit API use to our only user.

For storage, a standard MySQL database is OK. But feel free to use something else if you're more comfortable with it.

###Out of scope
The goal of this exercise is to asses your technical capabilities, but it would be unreasonable to ask for a complete application, so some aspects will be left out of scope. The following is out of scope, and implementing them will not get you bonus points. We prefer a well executed small application over a larger application with less attention to detail.

1. User management. There's only one user.
2. A front-end. We're only asking for an API, no forms.

###What do we look at?
Of course we will be looking at the quality of your code, but more specifically we're looking at the points below. Of course, each point is to some extent objective, so don't try the find the right answer. Instead, consider them as hints of what we'll be looking at, and do what you consider the best way to write the application.


####Object Oriented Programming skills
We will be looking at your skills in designing an application that follows good practices of object oriented application design.

####HTTP
We will be looking at your understanding of HTTP (correctly formatted requests and responses, response codes, methods, headers etc).

####Performance
Your API shouldn't be unnecessarily slow, and shouldn't be over optimized. We're not going to measure execution speed, but we will be looking at how your design decisions could impact performance.

####Security
You need to keep security in mind. No one should be able to compromise it, not even it's one and only user.

####Maintainability / extendability
Maintaining the API, and adding more features to it should be easy and should not require rewriting (too much) of the code.

####Error handling
Your API should fail gracefully if something unexpected happens.

####Bonus points
Bonus points can be awarded if you scored well at the above points, but also do the following:

- Host your API so we can use it using CURL
- Provide a clear documentation of the usage of the API's endpoints

Please be aware that these are not required, but they will have an impact.

####Secret bonus points
We also have some secret bonus points to give away. Keep in mind that they are not necessary to get a good score on the test. Good developers will get a good score by following the requirements above. Great developers will score these bonus points by following their instincts.



###Some last words
While you're working on the test, feel free to push to your GitHub account. It makes it easier for us to follow what you're doing. A public repository is fine if you don't have a paid account. If anything is unclear while you're working on the test, please ask. Once you send us the test, we would appreciate it if you briefly explain why you think you scored well, or less well on each of the above categories. Any feedback about the test itself is welcome too.
