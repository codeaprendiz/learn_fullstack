# ReadMe-static

- [ReadMe-static](#readme-static)
  - [VS Code Extensions](#vs-code-extensions)
  - [FAQs](#faqs)
    - [What's the difference between gradle groovy and gradle kotlin](#whats-the-difference-between-gradle-groovy-and-gradle-kotlin)
    - [While running the application it always remains stuck on following](#while-running-the-application-it-always-remains-stuck-on-following)
    - [Difference between JDK, JRE and Java SE](#difference-between-jdk-jre-and-java-se)

## VS Code Extensions

- [Extension Pack for Java](https://marketplace.visualstudio.com/items?itemName=vscjava.vscode-java-pack)
- [Spring Boot Extension Pack](https://marketplace.visualstudio.com/items?itemName=vmware.vscode-boot-dev-pack)
- [XML](https://marketplace.visualstudio.com/items?itemName=redhat.vscode-xml)
- [Gradle for Java](https://marketplace.visualstudio.com/items?itemName=vscjava.vscode-gradle)

## FAQs

### What's the difference between gradle groovy and gradle kotlin

> ANS by GPT4

The difference between Gradle Groovy and Gradle Kotlin refers to the DSL (Domain Specific Language) that is used for writing the build scripts.

Gradle Groovy DSL:

- Uses Groovy, a dynamic language that runs on the Java platform. 
- It is the original DSL for Gradle and has been in use for a long time, so there's a lot of community knowledge and plugins available.
- It is more concise for simple scripts because of its dynamic nature.

Gradle Kotlin DSL:

- Uses Kotlin, a statically typed programming language that is fully interoperable with Java.
- It offers better IDE support due to its static nature, including auto-completion and refactoring which can lead to fewer runtime errors and more maintainable build scripts.
- It is relatively newer compared to the Groovy DSL but gaining popularity because of the advantages that come with Kotlin.

Both DSLs are fully supported by Gradle, and you can choose either based on your preference or the specifics of the project you are working on.

### While running the application it always remains stuck on following

```bash
<==========---> 80% EXECUTING [1m 53s]
> :bootRun
```

> ANS by GPT 4

The behavior you're seeing where the `bootRun` task seems to be "stuck" at 80% EXECUTING is actually normal when running a Spring Boot application with Gradle. The `bootRun` task compiles your sources and starts up the server. Once the server is up, it will continue to run and listen for requests, which means the task is not complete, and Gradle will continue to show it as executing. It's waiting for you to manually stop the server, which is when Gradle will mark the task as finished.

This can be confusing because it looks like something might be wrong, but in reality, it's just how the `bootRun` task is designed to work. It will remain in that state until the server process is terminated, either through an interrupt signal like CTRL+C in the console or by stopping the process through other means. After stopping the server, Gradle will complete the task and move past the EXECUTING stage. This behavior ensures that the server keeps running for as long as you need it to, which is the expected behavior for most server applications.

### Difference between JDK, JRE and Java SE

[stackoverflow.com » Java SE 6 vs. JRE 1.6 vs. JDK 1.6 - What do these mean](https://stackoverflow.com/questions/250517/java-se-6-vs-jre-1-6-vs-jdk-1-6-what-do-these-mean)

JDK - Java Development Kit
JRE - Java Runtime Environment
Java SE - Java Standard Edition

SE defines a set of capabilities and functionalities; there are more complex editions (Enterprise Edition – EE) and simpler ones (Micro Edition – ME – for mobile environments).

The JDK includes the compiler and other tools needed to develop Java applications; JRE does not. The JDK also includes a JRE. So, to run a Java application someone else provides, you need a JRE; to develop a Java application, you need a JDK