# Settings.xml.md

[maven.apache.org » settings.xml](https://maven.apache.org/settings.html)

## Location

- The Maven install: ${maven.home}/conf/settings.xml

```bash
$ mvn -v
Apache Maven 3.9.6
Maven home: /opt/homebrew/Cellar/maven/3.9.6/libexec
Java version: 21.0.2, vendor: Homebrew, runtime: /opt/homebrew/Cellar/openjdk/21.0.2/libexec/openjdk.jdk/Contents/Home

$ ls /opt/homebrew/Cellar/maven/3.9.6/libexec/conf             
logging        settings.xml   toolchains.xml
```

- A user's install: ${user.home}/.m2/settings.xml

```bash
$ ls ~/.m2           
repository settings.xml
```

## Copy from global location to .m2 folder

```bash
# You can have a look at this default settings.xml file as it has comments as well
$ cp -rfp /opt/homebrew/Cellar/maven/3.9.6/libexec/conf/settings.xml .m2/

```
