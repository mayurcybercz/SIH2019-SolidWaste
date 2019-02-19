#!/usr/bin/env python
# coding: utf-8

# In[ ]:
# print('in')
# print('in')

import numpy as np

import sys
import skimage

from skimage import io

import warnings

if not sys.warnoptions:
    warnings.simplefilter("ignore")

model=np.load('mlmodel/model.npy')


# In[ ]:


def sigmoid(z):
	return (1/(1+np.exp(-z)))


# In[ ]:


def predict_image(w, b, X):
	Y_predict = None
	w = w.reshape(X.shape[0], 1)
	A = sigmoid(np.dot(w.T, X) + b)
	for i in range(A.shape[1]):
		if A[0, i] <= 0.5:
			Y_predict = 0
		else:
			Y_predict = 1

	return Y_predict


# In[ ]:



img = io.imread(''+sys.argv[1])
img = skimage.transform.resize(img,(64,64))
x              = img
x              = x.flatten()
x              = np.expand_dims(x, axis=1)

#print(x)
predict        = predict_image(model[()]["w"], model[()]["b"], x)

predict_label  = ""
if predict == 0:
    predict_label = "dustbin"
else:
    predict_label = "other"


print(predict_label)


# In[ ]:



