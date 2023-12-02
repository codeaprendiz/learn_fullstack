# Practice 2

- **Arithmetic Operators**: `+`, `-`, `*`, `/`, `%` are used for basic arithmetic operations.
- **Relational Operators**: `==`, `!=`, `<`, `>`, `<=`, `>=` are used to compare two values.
- **Logical Operators**: `&&` (logical AND), `||` (logical OR), `!` (logical NOT) are used in boolean expressions.
- **Bitwise Operators**: `&` (AND), `|` (OR), `^` (XOR), `<<` (left shift), `>>` (right shift) are used for bit manipulation.
- **Assignment Operators**: `=`, `+=`, `-=`, `*=`, `/=`, `%=` are used to assign and modify the value of a variable.
- **Miscellaneous Operators**: The `&` operator gets the address of a variable, and `*` is used to access the value at a given address (dereferencing).

## Run

```bash
$ go run operators.go
Arithmatic operators : a=10, b=3a + b =  13
a - b =  7
a * b =  30
a / b =  3
a % b =  1

Relations Operators : a=10, b=3
a == b =  false
a != b =  true
a < b =  false
a > b =  true
a <= b =  false
a >= b =  true

Logical Operators : x=true, y=false
x && y =  false
x || y =  true
!x =  false

Bitwise Operators : a=10, b=3
a & b =  2
a | b =  11
a ^ b =  9
a << b =  80
a >> b =  1

Assignment Operators : c=5
c += 3 :  8
c -= 2 :  6
c *= 3 :  18
c /= 3 :  6
c %= 3 :  0

Miscellaneous Operators : d=10
Value of d : 10
Addres of d : 0x1400009c018
Value at address of ptr : 10
```

### Bitwise Operators Output Explaination

1. **Bitwise AND (`&`)**:
   - Operation: `a & b`
   - Binary Representation:
     - `a` (10) in binary: 1010
     - `b` (3) in binary: 0011
   - Bitwise AND compares each bit of `a` with `b`: Result: `2`

    ```bash
    1010
    0011
    ----
    0010  (2 in decimal)
    ```

2. **Bitwise OR (`|`)**:
   - Operation: `a | b`
   - Binary Representation:
     - `a` (10) in binary: 1010
     - `b` (3) in binary: 0011
   - Bitwise OR compares each bit of `a` with `b`: Result: `11`

    ```bash
    1010
    0011
    ----
    1011  (11 in decimal)
    ```

3. **Bitwise XOR (`^`)**:
   - Operation: `a ^ b`
   - Binary Representation:
     - `a` (10) in binary: 1010
     - `b` (3) in binary: 0011
   - Bitwise XOR compares each bit of `a` with `b`:

    ```bash
        1010
        0011
        ----
        1001  (9 in decimal)
    ```

   - XOR gives `1` if the bits are different, `0` if they are the same.
   - Result: `9`

4. **Left Shift (`<<`)**:
   - Operation: `a << b`
   - This shifts the binary representation of `a` to the left by `b` bits.
   - `a` (10) in binary: 1010
   - Shifting `1010` left by `3` bits: `1010000` (80 in decimal)
   - Result: `80`

5. **Right Shift (`>>`)**:
   - Operation: `a >> b`
   - This shifts the binary representation of `a` to the right by `b` bits.
   - `a` (10) in binary: 1010
   - Shifting `1010` right by `3` bits: `0001` (1 in decimal)
   - Right shift introduces zeros on the left.
   - Result: `1`
