const grab = (flag) => {
  let indexAfterFlag = process.argv.indexOf(flag) + 1;
  return process.argv[indexAfterFlag];
};

console.log(process.versions.node);
console.log(process.pid);
console.log(process.argv)

const greeting = grab("--greeting");
const user = grab("--user");

console.log(`${greeting} ${user}`);
