# [Maven in 5 minutes](https://maven.apache.org/guides/getting-started/maven-in-five-minutes.html)

## [Installation](https://maven.apache.org/guides/getting-started/maven-in-five-minutes.html#installation)

```bash
$ mvn --version                    
Apache Maven 3.9.6
Maven home: /opt/homebrew/Cellar/maven/3.9.6/libexec
Java version: 21.0.2, vendor: Homebrew, runtime: /opt/homebrew/Cellar/openjdk/21.0.2/libexec/openjdk.jdk/Contents/Home
```

## [Creating a project](https://maven.apache.org/guides/getting-started/maven-in-five-minutes.html#creating-a-project)

```bash
mvn archetype:generate \
-DgroupId=com.mycompany.app \
-DartifactId=my-app \
-DarchetypeArtifactId=maven-archetype-quickstart \
-DarchetypeVersion=1.4 \
-DinteractiveMode=false
```

Directory Generated

```bash
$ tree my-app 
my-app
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

## [The POM](https://maven.apache.org/guides/getting-started/maven-in-five-minutes.html#the-pom)

## [Build the project](https://maven.apache.org/guides/getting-started/maven-in-five-minutes.html#build-the-project)

```bash
$ cd my-app
$ mvn package
..
[ERROR] Failed to execute goal org.apache.maven.plugins:maven-compiler-plugin:3.8.0:compile (default-compile) on project my-app: Compilation failure: Compilation failure: 
# Check https://stackoverflow.com/questions/53034953/error-source-option-5-is-no-longer-supported-use-6-or-later-on-maven-compile
# Go to the next section ## JAVA 9 or later to fix this error

$ java --version
openjdk 21.0.2 2024-01-16
OpenJDK Runtime Environment Homebrew (build 21.0.2)
OpenJDK 64-Bit Server VM Homebrew (build 21.0.2, mixed mode, sharing)
```

Changes required in `pom.xml`

```xml
    ...
    <properties>
        <maven.compiler.source>21</maven.compiler.source>
        <maven.compiler.target>21</maven.compiler.target>
        <!-- Set the Java version to target -->
        <maven.compiler.release>21</maven.compiler.release>
    </properties>

    <build>
        <pluginManagement>
            <plugins>
                <plugin>
                    <groupId>org.apache.maven.plugins</groupId>
                    <artifactId>maven-compiler-plugin</artifactId>
                    <version>3.8.1</version>
                </plugin>
            </plugins>
        </pluginManagement>
    </build>
    ...
```

You may test the newly compiled and packaged JAR with the following command

```bash
java -cp target/my-app-1.0-SNAPSHOT.jar com.mycompany.app.App
```

Output

```bash
Hello World!
```

## [Java 9 or later](https://maven.apache.org/guides/getting-started/maven-in-five-minutes.html#java-9-or-later)
