.. include:: /Includes.rst.txt
.. index:: Configuration
.. _configuration:

=====================
General configuration
=====================

| Download the extension.
| See: :ref:`installation`

Variables
---------------------

.. confval:: templatePath

    :Required: true
    :type: string

    Path to the pug template on the filesystem.

.. confval:: variables

    :Required: false
    :type: string or cObject

    Variables to pass on to the pug template renderer.

.. confval:: dataProcessing

    :Required: false
    :type: array of class references by full namespace
    :see: `DataProcessing documentation <https://docs.typo3.org/m/typo3/reference-typoscript/main/en-us/ContentObjects/Fluidtemplate/DataProcessing.html>`__

.. confval:: debug

    :Required: false
    :type: boolean

    | Showes a debug output in the frontend with all variables for this template.
    | It can also be globally activated for every pug template by adding the parameter `pugdump=1` to the uri.
    |

    :example: .. image:: /Images/debug_1.png  

