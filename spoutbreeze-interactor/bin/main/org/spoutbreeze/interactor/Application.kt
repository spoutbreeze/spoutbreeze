package org.spoutbreeze.interactor

import io.micronaut.runtime.Micronaut.*
fun main(args: Array<String>) {
	build()
	    .args(*args)
		.packages("org.spoutbreeze")
		.start()
}

