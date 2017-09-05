import React from 'react'
import {PropTypes as T} from 'prop-types'
import classes from 'classnames'

import {ErrorBlock} from './error-block.jsx'
import {HelpBlock} from './help-block.jsx'

export const FormGroup = props =>
  <div className={classes('form-group', props.className, {
    'form-last': props.last,
    'has-error': props.error && !props.warnOnly,
    'has-warning': props.error && props.warnOnly
  })}>
    <label
      className={classes('control-label', {'sr-only': props.hideLabel})}
      htmlFor={props.controlId}
    >
      {props.label}
    </label>

    {props.children}

    {props.error &&
      <ErrorBlock text={props.error} inGroup={true} warnOnly={props.warnOnly}/>
    }

    {props.help &&
      <HelpBlock help={props.help} />
    }
  </div>

FormGroup.propTypes = {
  controlId: T.string.isRequired,
  label: T.string.isRequired,
  hideLabel: T.bool,
  className: T.string,
  children: T.node.isRequired,
  warnOnly: T.bool,
  help: T.string,
  error: T.string,
  last: T.bool
}

FormGroup.defaultProps = {
  warnOnly: false,
  hideLabel: false,
  last: false
}