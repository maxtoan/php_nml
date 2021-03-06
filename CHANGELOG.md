## CHANGELOG
Release notes for *PHP: Nelson Martell Library*.

### Release 0.7.1 (WIP)

#### :star: Important changes

#### :notebook: Development changes

#### More changes

See [changes since v0.7.0](https://github.com/nelson6e65/php_nml/compare/v0.7.0...master?w=1) for more detailed info.



### Release 0.7.0 (2017-12-04)

#### :star: Important changes

This release is mainly intended to provide PHP 7 compatibility:

- :fire: Rename class _`NelsonMartell\Extensions\String`_ to **`NelsonMartell\Extensions\Text`**, but still available in PHP 5.6 as alias.
- :fire: Rename class _`NelsonMartell\Object`_ to **`NelsonMartell\StrictObject`**, but still available in PHP < 7.2 as alias.
- :fire: Drop support for PHP < 5.6.
- :fire: Remove deprecated code in v0.6.
- :fire: Remove global functions. Are only available under `NelsonMartell` namespace now.
- :bug: Correct minor issues.

#### :notebook: Development changes

There are some improvements for development:

- :arrow_up: Use **PHPUnit** 5.7 and update tests.
- :arrow_up: Use **PHP Code Sniffer** 3.0.
- :arrow_up: Prepare code to use **ApiGen** 5.0 (removed as dependency).
- :up: Update some internal scripts and other moved to the composer.json.
- :new: Add utility scripts to the composer.json (check the [CONTRIBUTING](CONTRIBUTING.md) file for more details):
  - `composer test-code`
  - `composer analize-code`
  - `composer autofix-code`
  - `composer check-all`
  - `composer build`:
    - `composer build-code-coverage`:
      - `composer build-code-coverage-clover`
      - `composer build-code-coverage-xml`
      - `composer build-code-coverage-html`
    - `composer build-api`
- :new: Add [CONTRIBUTING](CONTRIBUTING.md) file.

> **NOTE**: API Documentation not updated to this release due to conflict in API generation tool.

#### More changes

See [changes since v0.6.1](https://github.com/nelson6e65/php_nml/compare/v0.6.1...v0.7.0?w=1) for more detailed info.


### Release 0.6.1 (2017-05-01)

- Minor improvements in sources and documentation info.
- Improvements in README instruccions.
- API deployment changes:
  - :fire: Deploy API documentation in local instead of TravisCI auto-generation.
  - :memo: Improve API deployment script.
- :new: Interfaces:
  - `IConvertibleToString`.
  - `IConvertibleToJson`.

See [changes since v0.6.0](https://github.com/nelson6e65/php_nml/compare/v0.6.0...v0.6.1) for more detailed info.


### Release 0.6.0 (2016-10-06)

#### Installation changes
- :fire: Removed dependencies copy. Now you must install dependencies manually if not using `composer`.

#### Public API changes
- :bug: Fixed issue (possible bug) in properties with custom prefix. Now, it must be implemented ``ICustomPrefixedPropertiesContainer`` in order to use custom getter/setter prefixes (in addition to `get`/`set` defaults).
  - :new: Interface: ``ICustomPrefixedPropertiesContainer``. Enables the use of custom properties getter/setter's prefixes.
  - :fire: Removed ``PropertiesHandler::$getterPrefix`` and ``PropertiesHandler::$setterPrefix`` static attributes (functionality replaced by ``ICustomPrefixedPropertiesContainer`` methods).
  - :up: Methods of ``PropertiesHandler`` trait are now ``protected`` (instead of ``private``) and rewritten to work in a ``static`` context (instead of object context).
- :bug: Fixed possible errors in ``Extensions\String::format`` if placeholder values are ``stdClass`` or warnings if value is not convertible to string (this is a weakness in ``usort`` usage in ``\Cake\Utility\Text\insert``). ``Extensions\String::format`` now throws a catchable ``\InvalidArgumentException`` if value of placeholder can't be convertible to string to avoid this :bug:.
- :new: Interface: ``IPropertiesContainer``.
- :new: Interface: ``IComparer``. Split from ``IComparable`` to use only ``compare`` method. ``Object`` class already implements ``IComparer``.
- :up: Deprecate ``IComparable::compare`` method, to be replaced by ``IComparer::compare``.
- :up: ``IComparable::compareTo`` implementations are now able to return ``null`` if objects can't be compared.
- :bug: :up: Improve ``Object::compare`` method to compare different types.
- :new: Created *namespaced global functions* under `NelsonMartell` and deprecated the global ones (`typeof(mixed $obj)` and other internal functions) to be removed in the next ``v0.7.0`` or ``v0.8.0`` release (see [issue #17](https://github.com/nelson6e65/php_nml/issues/17)).
- :memo: Improved and updated API documentation.
- :up: Other minor improvements and fixes.

> Classes/interfaces/traits names in this description are under ``NelsonMartell`` namespace by default (unless name starts with ``\``).


#### Development changes
- :new: Tracking development progress in [waffle.io](http://waffle.io/nelson6e65/php_nml).
- :art: Update copyright year and email in source files.
- :memo: Improve & update [README](README.md) file.
- :white_check_mark: Configure UnitTesting and added some tests for classes.
- :white_check_mark: Configure PHP CodeSniffer to be compliance with PSR2 coding standar by default.
- :new: Testing helpers (traits):
  - ``NelsonMartell\Test\Helpers\``:
    - ``ExporterPlugin``
    - ``ConstructorMethodTester``
    - ``IComparerTester``
    - ``IComparableTester``
    - ``IPropertiesContainerTester``
- :up: Configure Travis CI for testing and API documentation generation.
- :new: Utility scripts (read [`script/README.md`](script/README.md) file:
- :art: Other minor code and documentation improvements.


See [changes since v0.5.1](https://github.com/nelson6e65/php_nml/compare/v0.5.1...v0.6.0) for more detailed info.



### Release 0.5.1
- Automatize API generation via Travis CI
- Some improvements in documentation and instructions
- Minor fixes in possible errors
- Coding standards and other minor fixes

See [detailed changelog](https://github.com/nelson6e65/php_nml/compare/v0.5.0...v0.5.1).

### Release 0.5.0
<!-- TODO -->
