(define (domain matrix)
(:requirements :typing :fluents)

	(:types data task hosts - object)

	(:predicates
		(have ?d - data)
		(availiable ?h - hosts)
		(half-availiable ?h - hosts)
		(working-full ?h - hosts ?t - task)
		(working-half ?h - hosts ?t - task)
		(input2 ?d1 - data ?d2 - data ?t - task)
		(output1 ?d1 - data ?t - task)
	)

	(:functions
		(total-cost)
	)

	(:action start-task-full2
	:parameters (?h - hosts ?t - task ?i1 - data ?i2 - data)
	:precondition (and (availiable ?h) (have ?i1) (have ?i2) (input2 ?i1 ?i2 ?t))
	:effect (and (working-half ?h ?t) (not (availiable ?h)) (increase (total-cost) 1))
	)

	(:action start-task-half2
	:parameters (?h - hosts ?t - task ?i1 - data ?i2 - data)
	:precondition (and (half-availiable ?h) (have ?i1) (have ?i2) (input2 ?i1 ?i2 ?t))
	:effect (and (working-full ?h ?t) (not (half-availiable ?h)) (increase (total-cost) 10))
	)

	(:action end-task-full1
	:parameters (?h - hosts ?t - task ?i1 - data)
	:precondition (and (working-half ?h ?t) (output1 ?i1 ?t))
	:effect (and (availiable ?h) (have ?i1) (not (half-availiable ?h)) (not (working-half ?h ?t)))
	)

	(:action end-task-half1
	:parameters (?h - hosts ?t - task ?i1 - data)
	:precondition (and (working-full ?h ?t) (output1 ?i1 ?t))
	:effect (and (half-availiable ?h) (have ?i1) (not (working-full ?h ?t)))
	)

)