package main

import (
	"fmt"
)

type employee struct {
	first string
	last  string
}

type manager struct {
	employee
	hasTeam bool
}

func (mgr manager) manageTeam() {
	if mgr.hasTeam {
		fmt.Printf("%v %v manages team", mgr.employee.first, mgr.employee.last)
	} else {
		fmt.Printf("%v %v does not manage team", mgr.employee.first, mgr.employee.last)
	}
}

func main() {
	mgr := manager{
		employee: employee{
			first: "Sara",
			last:  "Smith",
		},
		hasTeam: false,
	}

	mgr.manageTeam()

}
