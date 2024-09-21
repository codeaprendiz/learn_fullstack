################
# Example One:
################

import mymodule as mymodule
mymodule.func_in_mymodule()

################
# Example Two:
################

import mymodule as mm
mm.func_in_mymodule()

################
# Example Three:
################

from mymodule import func_in_mymodule
func_in_mymodule()

################
# Example Four:
################

from mymodule import *
func_in_mymodule()
