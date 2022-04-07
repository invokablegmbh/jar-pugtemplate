.. include:: /Includes.rst.txt
.. index:: Example
.. _example:

Example
========

Simple example of rendering a pug template.
Templatepath is mandatory.

   Example::

		page.999 = PUGTEMPLATE 
		page.999 {
		variables {
			var1 = TEXT
			var1.value = 123456789
			var2 = 123
		}
		dataProcessing {
		}
		templatePath = fileadmin/test.pug
		}
