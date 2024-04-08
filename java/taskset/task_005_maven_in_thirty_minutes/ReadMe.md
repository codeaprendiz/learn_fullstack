# [Maven in thirty minutes](https://maven.apache.org/guides/getting-started/index.html)

- [Maven in thirty minutes](#maven-in-thirty-minutes)
  - [How do I make my first Maven project?](#how-do-i-make-my-first-maven-project)
  - [How do I compile my test sources and run my unit tests?](#how-do-i-compile-my-test-sources-and-run-my-unit-tests)
  - [How do I create a JAR and install it in my local repository?](#how-do-i-create-a-jar-and-install-it-in-my-local-repository)
  - [What is a SNAPSHOT version?](#what-is-a-snapshot-version)
  - [How do I use plugins?](#how-do-i-use-plugins)
  - [How do I add resources to my JAR?](#how-do-i-add-resources-to-my-jar)
  - [How do I filter resource files?](#how-do-i-filter-resource-files)
  - [How do I use external dependencies?](#how-do-i-use-external-dependencies)
  - [How do I deploy my jar in my remote repository?](#how-do-i-deploy-my-jar-in-my-remote-repository)
  - [How do I create documentation?](#how-do-i-create-documentation)
  - [How do I build other types of projects?](#how-do-i-build-other-types-of-projects)
  - [digitalocean.com » docs](#digitaloceancom--docs)


## [How do I make my first Maven project?](https://maven.apache.org/guides/getting-started/index.html#how-do-i-make-my-first-maven-project)

```bash
mvn -B archetype:generate -DgroupId=com.mycompany.app -DartifactId=my-app -DarchetypeArtifactId=maven-archetype-quickstart -DarchetypeVersion=1.4
```

Project state

```bash
$ tree .               
.
├── ReadMe.md
└── my-app
    ├── pom.xml
    └── src
        ├── main
        │   └── java
        │       └── com
        │           └── mycompany
        │               └── app
        │                   └── App.java
        └── test
            └── java
                └── com
                    └── mycompany
                        └── app
                            └── AppTest.java
```

## [How do I compile my test sources and run my unit tests?](https://maven.apache.org/guides/getting-started/index.html#how-do-i-compile-my-application-sources)

Make changes in  `pom.xml`

```bash
$ cat pom.xml| grep "21" 
    <maven.compiler.source>21</maven.compiler.source>
    <maven.compiler.target>21</maven.compiler.target>
```

```bash
cd my-app
mvn test
```

Output

```bash
[INFO] Tests run: 1, Failures: 0, Errors: 0, Skipped: 0
[INFO] 
[INFO] ------------------------------------------------------------------------
[INFO] BUILD SUCCESS
[INFO] ------------------------------------------------------------------------
```

Just compile and not test

```bash
mvn test-compile
```

## [How do I create a JAR and install it in my local repository?](https://maven.apache.org/guides/getting-started/index.html#how-do-i-create-a-jar-and-install-it-in-my-local-repository)

Making a JAR file is straight forward enough and can be accomplished by executing the following command:

```bash
mvn package
```

Output

```bash
[INFO] Building jar: ~/workspace/codeaprendiz/learn_java/taskset/task_005_maven_in_thirty_minutes/my-app/target/my-app-1.0-SNAPSHOT.jar
[INFO] ------------------------------------------------------------------------
[INFO] BUILD SUCCESS
[INFO] ------------------------------------------------------------------------
```

Now you'll want to install the artifact you've generated (the JAR file) in your local repository (${user.home}/.m2/repository is the default location). For more information on repositories you can refer to our Introduction to Repositories but let's move on to installing our artifact! To do so execute the following command:

```bash
mvn install
```

Output

```bash
[INFO] Installing ~/workspace/codeaprendiz/learn_java/taskset/task_005_maven_in_thirty_minutes/my-app/target/my-app-1.0-SNAPSHOT.jar to ~/.m2/repository/com/mycompany/app/my-app/1.0-SNAPSHOT/my-app-1.0-SNAPSHOT.jar
[INFO] Installing ~/workspace/codeaprendiz/learn_java/taskset/task_005_maven_in_thirty_minutes/my-app/pom.xml to ~/.m2/repository/com/mycompany/app/my-app/1.0-SNAPSHOT/my-app-1.0-SNAPSHOT.pom
[INFO] ------------------------------------------------------------------------
[INFO] BUILD SUCCESS
[INFO] ------------------------------------------------------------------------

$ find ~/.m2/repository -name my-app-1.0-SNAPSHOT.jar
~/.m2/repository/com/mycompany/app/my-app/1.0-SNAPSHOT/my-app-1.0-SNAPSHOT.jar
```

To get basic information about your project is execute the following command

```bash
mvn site
```

Output

```bash
[INFO] Rendering content with org.apache.maven.skins:maven-default-skin:jar:1.2 skin.
[INFO] Generating "Dependencies" report  --- maven-project-info-reports-plugin:3.0.0:dependencies
[INFO] Generating "Dependency Information" report --- maven-project-info-reports-plugin:3.0.0:dependency-info
[INFO] Generating "About" report         --- maven-project-info-reports-plugin:3.0.0:index
[INFO] Generating "Plugin Management" report --- maven-project-info-reports-plugin:3.0.0:plugin-management
[INFO] Generating "Plugins" report       --- maven-project-info-reports-plugin:3.0.0:plugins
[INFO] Generating "Summary" report       --- maven-project-info-reports-plugin:3.0.0:summary
[INFO] ------------------------------------------------------------------------
[INFO] BUILD SUCCESS
[INFO] ------------------------------------------------------------------------
```

This generates report in `target/site` folder

```bash
$ tree target/site | grep html
├── dependencies.html
├── dependency-info.html
├── index.html
├── plugin-management.html
├── plugins.html
├── project-info.html
└── summary.html
```

## [What is a SNAPSHOT version?](https://maven.apache.org/guides/getting-started/index.html#what-is-a-snapshot-version)

During the release process, a version of x.y-SNAPSHOT changes to x.y. The release process also increments the development version to x.(y+1)-SNAPSHOT. For example, version 1.0-SNAPSHOT is released as version 1.0, and the new development version is version 1.1-SNAPSHOT.

```bash
$ cat pom.xml| egrep "<artifactId>my-app</artifactId>" -A 1 -B 1
  <groupId>com.mycompany.app</groupId>
  <artifactId>my-app</artifactId>
  <version>1.0-SNAPSHOT</version>
```

## [How do I use plugins?](https://maven.apache.org/guides/getting-started/index.html#how-do-i-use-plugins)

## [How do I add resources to my JAR?](https://maven.apache.org/guides/getting-started/index.html#how-do-i-add-resources-to-my-jar)

## [How do I filter resource files?](https://maven.apache.org/guides/getting-started/index.html#how-do-i-filter-resource-files)

## [How do I use external dependencies?](https://maven.apache.org/guides/getting-started/index.html#how-do-i-use-external-dependencies)

## [How do I deploy my jar in my remote repository?](https://maven.apache.org/guides/getting-started/index.html#how-do-i-use-external-dependencies)

For deploying jars to an external repository, you have to configure the repository url in the `pom.xml` and the authentication information for connecting to the repository in the `settings.xml`.

## [How do I create documentation?](https://maven.apache.org/guides/getting-started/index.html#how-do-i-use-external-dependencies)

## [How do I build other types of projects?](https://maven.apache.org/guides/getting-started/index.html#how-do-i-use-external-dependencies)

## [digitalocean.com » docs](https://www.digitalocean.com/community/tutorials/maven-commands-options-cheat-sheet)

This command generates the dependency tree of the Maven project:

```bash
mvn dependency:tree
```

Output

```bash
[INFO] com.mycompany.app:my-app:jar:1.0-SNAPSHOT
[INFO] \- junit:junit:jar:4.11:test
[INFO]    \- org.hamcrest:hamcrest-core:jar:1.3:test
[INFO] ------------------------------------------------------------------------
[INFO] BUILD SUCCESS
[INFO] ------------------------------------------------------------------------
```